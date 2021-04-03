<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;

use App\User;

use Image;

class UsersController extends Controller
{
    public function index(){
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    
    public function show($id){
        $user = User::findOrFail($id);

        return view('users.show', [
            'user' => $user,
        ]);
        
        
    }
    
    
    public function edit($id){
        $user = User::findOrFail($id);
        
        return view('users.edit', [
            'user' => $user,
        ]);
    }
    
    
    public function update(Request $request, $id){
        // バリデーション
        $request->validate([
            'name' => 'max:25',
            'profile_image' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
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
        $img = \Image::make($image);
        // resize
        $img->fit(100, 100, function($constraint){
            $constraint->upsize(); 
        });
        // save
        $file_name = 'profile_'.$id.'.'.$image->getClientOriginalExtension();
        $save_path = 'public/profiles/'.$file_name;
        Storage::put($save_path, (string) $img->encode());

        // return file name
        return $file_name;
    }
    
    
    public function destroy($id){
        $user = User::findOrFail($id);
        
        $user->delete();
        
        return redirect('/');
    }
    
    
    
    
}
