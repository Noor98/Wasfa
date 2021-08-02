<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends BaseController
{
    public function index()
    {
        $q=request()["q"];
        $status=request()["status"];
        $items = Category::whereRaw(" isdelete=0 ");
        if($q!=NULL)
            $items->whereRaw("(name like ?)",["%$q%"]);
        if($status!=NULL)
            $items->whereRaw("status = ?",[$status]);
        $items = $items->paginate(10)->appends(["q"=>$q,"status"=>$status]);
        return view("admin.category.index",compact("items","q","status"));
    }

    public function create()
    {
        return view("admin.category.create");
    }

    public function store(CategoryRequest $request)
    {
        $IsExists = Category::where("name",$request["name"])->where("isdelete",0)->count()>0;
        if($IsExists){
            Session::flash("msg","w: العنصر المنوي ادخاله موجود مسبقا");
            return redirect("/admin/category/create")->withInput();
        }
        $item = new Category();
        $item->name = $request["name"];
        $item->status = $request["status"]?1:0;
        $item->created_by = $this->adminId;
        $item->save();
        
        Session::flash("msg","s: تمت عملية الاضافة بنجاح");
        
        return redirect("/admin/category/create");
    }

    public function edit($id)
    {
        $item = Category::find($id);
        if($item == NULL || $item->isdelete){
            Session::flash("msg","e: الرجاء التأكد من الرابط المطلوب");
            return redirect("/admin/category");
        }
        return view("admin.category.edit",compact("item"));
    }
    public function status($id)
    {
        //sleep(1);
        $item = Category::find($id);
        if($item == NULL || $item->isdelete){           
            return response()->json([
                'status' => '0',
                'msg' => 'لم تتم العملية'
            ]);
        }
        $item->status = !$item->status;
        $item->save();
        return response()->json([
            'status' => '1',
            'msg' => 'تمت العملية بنجاح'
        ]);
    }
    public function update(CategoryRequest $request, $id)
    {
        $IsExists = Category::where("name",$request["name"])
            ->where("isdelete",0)->where("id",'!=',$id)->count()>0;
        if($IsExists){
            Session::flash("msg","w: العنصر المنوي ادخاله موجود مسبقا");
            return redirect("/admin/category/$id/edit")->withInput();
        }
        $item = Category::find($id);
        $item->name = $request["name"];
        $item->status = $request["status"]?1:0;
        $item->updated_by = $this->adminId;
        $item->save();
        
        Session::flash("msg","i: تمت عملية الحفظ بنجاح");
        
        return redirect("/admin/category");
    }
    public function destroy($id)
    {
         $item = Category::find($id);
         $item->isdelete=1;
         $item->updated_by=$this->adminId;
         $item->save();
        
         Session::flash("msg","w: تمت عملية الحذف بنجاح");
        
         return redirect("/admin/category");
    }
}