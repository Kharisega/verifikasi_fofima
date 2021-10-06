<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('password.edit');
    }

    public function update()
    {
        request()->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $currentPassword = auth()->user()->password;
        $oldPassword = request('old_password');
        
        if (Hash::check($oldPassword, $currentPassword)) {
            auth()->user()->update([
                'password' => bcrypt(request('password')),
            ]);
            return back()->with('success', "You are changed your password");
        } else {
            return back()->withErrors(['old_password' => 'Make sure you fill your current password']);
        }
    }
}
