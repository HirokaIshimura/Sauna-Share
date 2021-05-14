<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;

use Illuminate\Support\Facades\Storage;

use App\User;

use InterventionImage;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザの投稿一覧を作成日時の降順で取得
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);
        
        // ユーザ詳細ビューでそれらを表示
        return view('users.show', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
    
    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        return view('users.edit', [
            'user' => $user,
        ]);
    }
    
    
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $profileImage = $request->file('profile_image');
        
        if ($profileImage != null) {
            $path = Storage::disk('s3')->putFile('/profile_images', $profileImage, 'public');
            $user->profile_image = $path;
        }

        $user->name = $request->name;

        $user->save();
        
        return redirect('users/'.$user->id);
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $deletePath = $user->profile_image;
        Storage::disk('s3')->delete($deletePath);
        $user->delete();
        
        return redirect('/');
    }
    
    
    /**
     * ユーザのフォロー一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function followings($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロー一覧を取得
        $followings = $user->followings()->paginate(10);

        // フォロー一覧ビューでそれらを表示
        return view('users.followings', [
            'user' => $user,
            'users' => $followings,
        ]);
    }
    

    /**
     * ユーザのフォロワー一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function followers($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロワー一覧を取得
        $followers = $user->followers()->paginate(10);

        // フォロワー一覧ビューでそれらを表示
        return view('users.followers', [
            'user' => $user,
            'users' => $followers,
        ]);
    }
    
    
    public function favorites($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのお気に入り一覧を取得
        $favorites = $user->favorites()->paginate(10);

        // お気に入り一覧ビューでそれらを表示
        return view('users.favorites', [
            'user' => $user,
            'posts' => $favorites,
        ]);
    }
}
