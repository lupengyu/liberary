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
class BackstageController extends Controller
{
    private function judge() {
        $admin_id = session('admin_id');
        if($admin_id == null) {
            return null;
        } else {
            return DB::table('admin')->where('aNo', $admin_id)->first();
        }
    }

    public function index() {
        $user = $this->judge();
        if($user == null) {
            return redirect('logout');
        }

        $lists = DB::table('book')->orderByDesc('time')->paginate(30);
        return view('backstage.index',
            [
                //'warning' => $warning,
                'lists' => $lists,
                'cnt' => 0,
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
        return view('backstage.index',
            [
                //'warning' => $warning,
                'lists' => $lists,
            ]
        );
    }

    public function addbook() {
        $user = $this->judge();
        if($user == null) {
            return redirect('logout');
        }

        $warning = session('warning');
        session([
            'warning' => null,
        ]);

        return view('backstage.addbook',
            [
                'warning' => $warning,
            ]
        );
    }

    public function addbookinformation() {
        $user = $this->judge();
        if($user == null) {
            return redirect('logout');
        }

        $isbn = Input::get('isdn');
        $bookname = Input::get('bookname');
        $anthor = Input::get('anthor');
        $data = Input::get('data');
        $cnt = Input::get('cnt');
        if($isbn == null) {
            return Redirect::back()->withInput()->with('warning','isbn不能为空');
        }
        if($bookname == null) {
            return Redirect::back()->withInput()->with('warning','书名不能为空');
        }
        if($anthor == null) {
            return Redirect::back()->withInput()->with('warning','作者不能为空');
        }
        if($data == null) {
            return Redirect::back()->withInput()->with('warning','出版日期不能为空');
        }
        if($cnt == null) {
            return Redirect::back()->withInput()->with('warning','数目不能为空');
        }
        if(is_numeric($cnt) == false) {
            return Redirect::back()->withInput()->with('warning','数目必须为数字');
        }
        $search = DB::table('book')->where('isbn', $isbn)->first();
        if($search != null) {
            return Redirect::back()->withInput()->with('warning','该isbn已存在');
        }
        DB::table('book')->insert([
            'isbn' => $isbn,
            'author' => $anthor,
            'cnt' => $cnt,
            'bname' => $bookname,
            'data' => $data
        ]);
        return redirect('backstage');
    }
}