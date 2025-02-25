<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function ProfileView(){
    	$id = Auth::user()->id;
    	$user = User::find($id);

    	return view('backend.user.view_profile',compact('user'));
    }
// End Method

    public function ProfileEdit(){
    	$id = Auth::user()->id;
    	$editData = User::find($id);
    	return view('backend.user.edit_profile',compact('editData'));
    }
// End Method

    public function ProfileStore(Request $request){

    	$data = User::find(Auth::user()->id);
    	$data->name = $request->name;
    	$data->email = $request->email;
    	$data->mobile = $request->mobile;
    	$data->address = $request->address;
    	$data->gender = $request->gender;

    	if ($request->file('images')) {
    		$file = $request->file('images');
    		@unlink(public_path('upload/user_images/'.$data->images));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/user_images'),$filename);
    		$data['images'] = $filename;
    	}
    	$data->save();

    	$notification = array(
    		'message' => 'User Profile Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('profile.view')->with($notification);

    }

   // End Method



 	public function PasswordView(){
 		return view('backend.user.edit_password');
 	}

// End Method

 	public function PasswordUpdate(Request $request){
 		$validatedData = $request->validate([
    		'oldpassword' => 'required',
    		'password' => 'required|confirmed',
    	]);


    	$hashedPassword = Auth::user()->password;
    	if (Hash::check($request->oldpassword,$hashedPassword)) {
    		$user = User::find(Auth::id());
    		$user->password = Hash::make($request->password);
    		$user->save();
    		// Auth::logout();

          $notification = array(
            'message' => 'User Password Updated Successfully',
            'alert-type' => 'info'
         );
          return redirect()->route('profile.view')->with($notification);

    		// return redirect()->route('login');
    	}else{
    		return redirect()->back();
    	}


 	} // End Metod







}
