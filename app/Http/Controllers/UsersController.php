<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;

use Illuminate\Support\Facades\Storage;

use App\User;

use InterventionImage;

class UsersController extends Controller
{
    public function index(){
        $users = User::orderBy('id', 'asc')->paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    
    public function show($id){
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
    
    
    public function edit($id){
        $user = User::findOrFail($id);
        
        return view('users.edit', [
            'user' => $user,
        ]);
    }
    
    
    public function update(UserRequest $request, $id){
        $user = User::findOrFail($id);
        $form = $request->all();
        $profileImage = $request->file('profile_image');
        
        if ($profileImage != null) {
            $form['profile_image'] = $this->saveProfileImage($profileImage, $id); // return file name
        }

        unset($form['_token']);
        unset($form['_method']);
        $user->fill($form)->save();
        
        return redirect('users/'.$user->id);
    }
    
    
    private function saveProfileImage($image, $id) {
        // get instance
        $img = InterventionImage::make($image);

        // resize
        $img->fit(200, 200, function($constraint){
            $constraint->upsize(); 
        });
        
        // save
        $file_name = 'profile_'.$id.'.'.$image->getClientOriginalExtension();
        $save_path = 'public/profiles/'.$file_name;
        Storage::disk('local')->put($save_path, (string) $img->encode('jpg'));

        // return file name
        return $file_name;
    }
    
    
    public function destroy($id){
        $user = User::findOrFail($id);
        $deletePath = 'public/profiles/'. $user->profile_image;
        Storage::disk('local')->delete($deletePath);
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