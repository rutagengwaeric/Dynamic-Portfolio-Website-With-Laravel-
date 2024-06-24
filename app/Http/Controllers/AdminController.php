<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AdminController extends Controller
{
    // Logout
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        )
        ;

        return redirect('/login')->with($notification);
    }
    public function Profile(){

        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view' ,[
            'adminData' => $adminData
        ]);

    }

    public function EditProfile(){

        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_edit' ,[
            'adminData' => $adminData
        ]);

    }
    public function StoreProfile(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_image'] = $filename ;
        }
        $data->update();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        )
        ;
        return redirect()->route('admin.profile')->with($notification);

    }

    public function ChangePassword(){

        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_change_password' , [
            'adminData' => $adminData
        ]);

    }

    public function UpdatePassword(Request $request){

        $validateData = $request->validate([

            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        if(Hash::check($request->oldpassword , Auth::user()->password)){
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->update();

            session()->flash('message' , 'Password Updated Successfully');
            return redirect()->back();

        }else{
            session()->flash('message', 'Old Password Does Not Match');
            return redirect()->back();

        }

    }
}
