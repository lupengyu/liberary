<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
//use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Mail;
use Redirect;

/**
 * 登录控制器
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    private function judge() {
        $admin_id = session('admin_id');
        if($admin_id != null) {
            return redirect('backstage');
        }
        $student_id = session('student_id');
        if($student_id != null) {
            return redirect('home');
        }
        return null;
    }

    public function index() {
        $user = $this->judge();
        if($user != null) {
            return $user;
        }

        $warning = session('warning');
        session([
            'warning' => null,
        ]);

        return view('index',
            [
                'warning' => $warning,
            ]
        );
    }

    public function register() {
        $name = Input::get('Name');
        $password = Input::get('Password');
        $email = Input::get('Email');
        $phone = Input::get('Phone_Number');
        if(strlen($name) < 2 || strlen($name) > 18) {
            return Redirect::back()->withInput()->with('warning','用户名最多18位最少2位');
        }
        $user = DB::table('admin')->where('name', $name)->first();
        if($user != null) {
            return Redirect::back()->withInput()->with('warning','用户名已被注册');
        }

        $user = DB::table('student')->where('name', $name)->first();
        if($user != null) {
            return Redirect::back()->withInput()->with('warning','用户名已被注册');
        }
        if(strlen($password) < 8 || strlen($password) > 18) {
            return Redirect::back()->withInput()->with('warning','密码最多18位最少8位');
        }
        if(strlen($email) > 18) {
            return Redirect::back()->withInput()->with('warning','邮箱最多18位');
        }
        if(strlen($phone) > 18) {
            return Redirect::back()->withInput()->with('warning','手机号最多18位');
        }

        DB::table('student')->insert([
            'name' => $name,
            'password' => md5($password),
            'email' => $email,
            'phone' => $phone
        ]);
        $user = DB::table('student')->where('name', $name)->first();
        session([
            'student_id' => $user->sNo,
        ]);
        return redirect('home');
    }

    public function login() {
        $name = Input::get('Userame');
        $password = (Input::get('Password'));
        $judge = Input::get('judge');
        if($judge != null) {
            setcookie("name", $name,time()+2*7*24*3600);
            setcookie("password", $password,time()+2*7*24*3600);
        } else {
            setcookie("name", NULL);
            setcookie("password", NULL);
        }
        $password = md5($password);
        $user = DB::table('admin')->where('name', $name)->where('password', $password)->first();
        if($user != null) {
            session([
                'admin_id' => $user->aNo
            ]);
            return redirect('backstage');
        }
        $user = DB::table('student')->where('name', $name)->where('password', $password)->first();
        if($user != null) {
            session([
                'student_id' => $user->sNo
            ]);
            return redirect('home');
        }
        return Redirect::back()->withInput()->with('warning','用户名或密码错误');
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect('/');
    }
}