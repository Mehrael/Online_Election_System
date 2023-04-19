<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Member extends Controller
{
    public function registerScreen()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required",
            "confirmPassword" => "required"
        ]);

        $username = $request->username;
        $password = $request->password;

        $show_username = true;
        $show_password = true;
        if (DB::table('users')->where('username', $username)->exists()) {
            $show_username = false;
            return view("admin.addAdmin", compact('show_username', 'show_password'));
        }

        if ($password != $request->confirmPassword) {
            $show_password = false;
            return view("admin.addAdmin", compact('show_username', 'show_password'));
        }

        DB::table('users')->insert([
            "username" => $username,
            "password" => $password,
            "type" => 0
        ]);

        return redirect('home');
    }

    public function homeScreen()
    {
        return view('member.home');
    }
}
