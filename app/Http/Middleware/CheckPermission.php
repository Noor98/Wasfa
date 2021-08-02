<?php

namespace App\Http\Middleware;

use Closure;
use App\Admin;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
		$user = \Auth::user();
		//الرابط المطلوب
        //App\Http\Controllers\Admin\CategoryController@index
		$currentAction = \Route::currentRouteAction();
        //dd($currentAction);
		if($user!=NULL){
            $admin=Admin::where("user_id",$user->id)->first();
            if($admin==NULL){
                return redirect('/login');
            }
			//الرابط المطلوب
			//example  App\Http\Controllers\FooBarController@index
			list($controller, $method) = explode('@', $currentAction);
			// $controller now is "App\Http\Controllers\FooBarController"		
			$controller = strtolower(preg_replace('/.*\\\/', '', $controller));
			$controller=str_replace("controller","",$controller);			
			if($method=="index")
				$method="";
            else
                $method="/$method";
			$url="/admin/$controller".$method;
			//dd($url);
            //بسأل جدول اللينكات هل يحتوي على الرابط المطلوب؟؟؟؟
			$link=\DB::table("link")->where("url",$url)->first();
            
			//معناه انه الرابط عليه صلاحيات
			if($link!=NULL)
			{
				$haveAdminThisLink=\DB::table("admin_link")
					->where("link_id",$link->id)
					->where("admin_id",$admin->id)
					->count();
				if(!$haveAdminThisLink){					
					return redirect('/admin/home/noaccess');
				}
			}
		}
        return $response;
    }
}
