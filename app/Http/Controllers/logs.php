<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class logs extends Controller
{
    public function login()
    {
        return view("login");
    }

    public function loginRequest(Request $request)
    {
        $user = DB::table('users')->where('username', $request->username)->first();
        if ($user->password == $request->password) {
            $request->session()->put('userID', $user->id);
            if ($user->type)
                return redirect('dashboard');
            else
                return redirect('home');

        }
        return redirect("/");
    }
}
