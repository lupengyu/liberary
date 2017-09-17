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
class HomeController extends Controller
{
    private function judge() {
        $student_id = session('student_id');
        if($student_id == null) {
            return null;
        } else {
            return DB::table('student')->where('sNo', $student_id)->first();
        }
    }

    public function index() {
        $user = $this->judge();
        if($user == null) {
            return redirect('logout');
        }

        $lists  = DB::table('book')->orderByDesc('time')->paginate(30);

        return view('home.index',
            [
                //'warning' => $warning,
                'lists' => $lists,
            ]
        );
    }

    public function searchbook() {
        $user = $this->judge();
        if($user == null) {
            return redirect('logout');
        }

        $name = Input::get('searchstr');

        $lists = DB::table('book')->orderByDesc('time')->where('bName', 'like', '%'.$name.'%')->paginate(30);
        return view('home.index',
            [
                //'warning' => $warning,
                'lists' => $lists,
            ]
        );
    }
}