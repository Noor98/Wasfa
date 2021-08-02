<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Admin;
use App\Http\Requests\AdminRequest;
use App\User;
class HomeController extends BaseController
{
    public function index()
    {
        return view("admin.home.index");
    }
    public function noaccess()
    {
        return view("admin.home.noaccess");
    }
}