<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;


class LoginController extends CommonController
{
    public function login()
    {
        if($input = Input::all()){
            $user = User::first();
            if($user->user_name != $input['user_name'] || $user->user_pass!= $input['user_pass']){
                return back()->with('msg','用户名或者密码错误！');
            }
            session(['user'=>$user]);
            return redirect('admin/index');
        }else {
            return view('admin.login');
        }
 }

    public function quit()
    {
        session(['user'=>null]);
        return redirect('admin/login');
    }

}
