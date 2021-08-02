<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Admin;

class BaseController extends Controller
{
    protected $admin;
    protected $user;
    protected $adminId=1;//رقم المستخدم الي فايت على لوحة التحكم
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckPermission');
        $this->middleware(function ($request, $next) {
            $this->user= \Auth::user();
            $admin = Admin::where("user_id",$this->user->id)->first();
            $this->admin=$admin;
            \View::share("admin",$admin);
            return $next($request);
        });
    }
}