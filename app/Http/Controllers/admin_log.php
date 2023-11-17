<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\admin;
use Illuminate\Http\Request;
// use App\Models\admin;
use App\Models\user_data;

class admin_log extends Controller
{
    //
    public function login_ch(Request $rq)
    {
        // echo "hello world";
        $user_log = user_data::where('gmail', $rq->gmail)
            ->where('password', $rq->password)
            ->first();


        if (isset($user_log)) {
            $errors = false;
            if($user_log->role_id == 1 ){
                $name = $user_log->username;
                $data=$rq->input();
                $user_id = $user_log->user_id;
                $rq->session()->put("admin_username", $name);
                $rq->session()->put("username", $name);
                $rq->session()->put("user_id", $user_id);
                $rq->session()->put("admin_id", $user_id);
                 // session(['username',  $name]);
                 return redirect('/homes');
            }elseif($user_log->role_id == 2){
                // echo "bookshop";
                $name = $user_log->username;
                $data = $rq->input();
                $user_id = $user_log->user_id;
                $rq->session()->put('username', $name);
                $rq->session()->put('user_id', $user_id);
                return redirect('/books');
            }else{
                $name = $user_log->username;
                $data=$rq->input();
                $user_id = $user_log->user_id;
                $rq->session()->put("username", $name);
                $rq->session()->put("user_id", $user_id);
                return redirect('/item');
            }
          
        } else {
            $errors = true;
            return view('login.login')->with('errors', $errors);

        }
    }

    public function logout(Request $rq)
    {
        // remove all session data
        session()->flush();
        return redirect('/');
    }
    public function loginform(){
        $errors = false;
        return view('login.login')->with('errors', $errors);
    }
}