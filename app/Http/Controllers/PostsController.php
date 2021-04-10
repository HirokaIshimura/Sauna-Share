<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PostRequest;

use Illuminate\Support\Facades\Storage;

use App\Post;

//エイリアスに追加したファサードを呼び出す。
use InterventionImage;

class PostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            $posts = $user->feed_posts()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        }

        return view('welcome', $data);
    }
    
    
    public function create()
    {
        // Postモデルのインスタンスを作成
       $post = new Post();
       
       return view('posts.create', [
            'post' => $post,
        ]);
    }
    
    
    public function store(PostRequest $request)
    {
        $form = $request->all();
        $file = $request->file('picture_url');
        
        if ($file != null){
            $path = $file->getClientOriginalName();
            //アスペクト比を維持、画像サイズを横幅1080pxにして保存する。
            InterventionImage::make($file)->resize(550, null, function ($constraint) {$constraint->aspectRatio();})->save(public_path('storage/post_pictures/' . $path));
            $form['picture_url'] = $path;
        }
        
        unset($form['_token']);
        unset($form['_method']);
        
        $request->user()->posts()->create($form);

        return redirect('/');
        
    }
    
    
    public function edit($id)
    {
        // idの値でポストを検索して取得
        $post = Post::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は
        if (\Auth::id() === $post->user_id) {
            // ポスト編集ビューでそれを表示
            return view('posts.edit', [
                'post' => $post,
            ]);
        }

    }
    
    
    public function update(PostRequest $request, $id)
    {
        // idの値でポストを検索して取得
        $post = Post::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は
        if (\Auth::id() === $post->user_id) {
            // ポストを更新
            $post->title = $request->title;
            $post->content = $request->content;
            $post->save();
    
            return redirect('/');
        }
    }
    
    
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $post = \App\Post::findOrFail($id);
        $deletePath = 'public/post_pictures/'.$post->picture_url;

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $post->user_id) {
            Storage::disk('local')->delete($deletePath);
            $post->delete();
        }

        // 前のURLへリダイレクトさせる
        return redirect('/');
    }
}
