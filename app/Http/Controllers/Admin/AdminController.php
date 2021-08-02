<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Admin;
use App\Http\Requests\AdminRequest;
use App\User;
class AdminController extends BaseController
{
    public function index()
    {
        $q=request()["q"];
        $email=request()["email"];
        $status=request()["status"];
        $items = Admin::whereRaw(" isdelete=0 ");
        if($q!=NULL)
            $items->whereRaw("(name like ?)",["%$q%"]);
        if($email!=NULL)
            $items->whereRaw("(email = ?)",["$email"]);
        if($status!=NULL)
            $items->whereRaw("status = ?",[$status]);
        
        $items = $items->paginate(10)->appends(["q"=>$q,"email"=>$email,"status"=>$status]);
        return view("admin.admin.index",compact("items","q","email","status"));
    }

    public function create()
    {
        return view("admin.admin.create");
    }

    public function store(AdminRequest $request)
    {
        $item = new Admin();
        if(User::IsExists($request["email"])){
           $request->session()->flash('msg', 'e:العنصر موجود مسبقا لدينا'); 
           return redirect("/admin/admin/create")->withInput();
        }
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        
        $item->user_id=$user->id;
        $item->name = $request["name"];
        $item->email = $request["email"];
        $item->status = $request["status"]?1:0;
        $item->created_by = $this->adminId;
        $item->save();
        Session::flash("msg","s: تمت عملية الاضافة بنجاح");
        return redirect("/admin/admin/create");
    }

    public function edit($id)
    {
        $item = Admin::find($id);
        if($item == NULL || $item->isdelete){
            Session::flash("msg","e: الرجاء التأكد من الرابط المطلوب");
            return redirect("/admin/admin");
        }
        return view("admin.admin.edit",compact("item"));
    }

    public function update(AdminRequest $request, $id)
    {
        $item = Admin::find($id);
        if(trim($request["password"])!=""){
            $user = User::find($item->user_id);            
            $user->name = $request['name'];
            $user->password = bcrypt($request['password']);
            $user->save();
        }        
        $item->name = $request["name"];
        $item->email = $request["email"];
        $item->status = $request["status"]?1:0;
        $item->user_id=1;
        $item->updated_by = $this->adminId;
        $item->save();
        Session::flash("msg","i: تمت عملية الحفظ بنجاح");
        return redirect("/admin/admin");
    }
    public function destroy($id)
    {
         $item = Admin::find($id);
         $item->isdelete=1;
         $item->updated_by=$this->adminId;
         $item->save();
        
         Session::flash("msg","w: تمت عملية الحذف بنجاح");
        
         return redirect("/admin/admin");
    }
    
    
    public function permission($id)
    {
        $item = Admin::find($id);
        if($item == NULL || $item->isdelete){
            Session::flash("msg","e: الرجاء التأكد من الرابط المطلوب");
            return redirect("/admin/admin");
        }
        return view("admin.admin.permission",compact("item"));
    }
    public function setpermission($id,Request $request)
    {
        \DB::table("admin_link")->where("admin_id",$id)->delete();
        $permissions = $request["permission"];
        foreach($permissions as $p){
            \DB::table("admin_link")
                ->insert(["link_id"=>$p,
                          "admin_id"=>$id,
                          "created_at"=>date("Y-m-d")]);
        }
        Session::flash("msg","w: تمت عملية الحفظ بنجاح");
        
        return redirect("/admin/admin/$id/permission");
    }
}