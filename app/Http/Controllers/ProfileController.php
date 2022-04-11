<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;


class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile.myProfile');
    }

    public function security()
    {
        return view('user.profile.security');
    }
    public function passwordStore(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:5',
            'password_confirmation' => 'required|min:5',
        ]);
        $db_pass = Auth::user()->password;
        $current_password = $request->old_password;
        $newpass = $request->new_password;
        $confirmpass = $request->password_confirmation;

        if (Hash::check($current_password, $db_pass)) {
            if ($newpass === $confirmpass) {
                User::findOrFail(Auth::id())->update([
                    'password' => Hash::make($newpass)
                ]);

                Auth::logout();
                $notification = array(
                    'message' => 'Your Password Change Success. Now Login With New Password',
                    'alert-type' => 'success'
                );

                return Redirect()->route('login')->with($notification);
            } else {

                $notification = array(
                    'message' => 'New Password And Confirm Password Not Same',
                    'alert-type' => 'error'
                );

                return Redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Old Password Not Match',
                'alert-type' => 'error'
            );

            return Redirect()->back()->with($notification);
        }
    }

    public function nextOfKin()
    {
        return view('user.profile.nextOfKin');
    }
}
