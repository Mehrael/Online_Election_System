<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Admin extends Controller
{
    public function index()
    {
        return view("admin.dashboard");
    }

    public function addAdminScreen()
    {
        $show_username =true;
        $show_password = true;
        return view("admin.addAdmin", compact('show_username','show_password'));
    }

    public function addAdmin(Request $request)
    {
        $request->validate([
            "username"=>"required",
            "password"=> "required",
            "confirmPassword"=>"required"
        ]);

        $username = $request->username;
        $password = $request->password;

        $show_username = true;
        $show_password = true;
        if(DB::table('users')->where('username',$username)->exists())
        {
            $show_username =false;
            return view("admin.addAdmin", compact('show_username','show_password'));
        }

        if($password != $request->confirmPassword)
        {
            $show_password = false;
            return view("admin.addAdmin", compact('show_username','show_password'));
        }

        DB::table('users')->insert([
            "username"=>$username,
            "password"=>$password,
            "type"=>1
        ]);

        return redirect("viewAdmins");
    }

    public function viewAdmins()
    {
        $admins = DB::table('users')->where('type','=',1)->get();
        return view("admin.viewAdmins",compact('admins'));
    }
}
