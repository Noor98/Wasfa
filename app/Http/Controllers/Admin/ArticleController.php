<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Category;
use App\Article;
use App\Comment;
use App\Http\Requests\ArticleRequest;

class ArticleController extends BaseController
{
    public function index()
    {
        $q=request()["q"];
		$publish_date=request()["publish_date"];
		$category_id=request()["category_id"];
        
        $status=request()["status"];
        $items = Article::whereRaw(" isdelete=0 ");
        if($q!=NULL)
            $items->whereRaw("(title like ?)",["%$q%"]);
		if($publish_date!=NULL)
            $items->whereRaw("publish_date = ?",[date("Y-m-d", strtotime($publish_date))]);
		if($category_id!=NULL)
            $items->whereRaw("category_id = ?",[$category_id]);
        if($status!=NULL)
            $items->whereRaw("status = ?",[$status]);
        $items = $items->paginate(10)->appends(["q"=>$q,"publish_date"=>$publish_date,"category_id"=>$category_id,"status"=>$status]);
		$categories = Category::all();
        return view("admin.article.index",compact("items","categories","q","publish_date","category_id","status"));
    }

    public function create()
    {
		$categories = Category::all();
        return view("admin.article.create",compact("categories"));
    }

    public function store(ArticleRequest $request)
    {
        $path = $request->file('image')->store('public/images');
        $item = new Article();
        $item->title = $request["title"];
		$item->summary = $request["summary"];
		$item->details = $request["details"];
		$item->publish_date = date("Y-m-d", strtotime($request["publish_date"]));
		$item->category_id = $request["category_id"];
		$item->image = basename($path);//$request["image"];
		$item->allowcomment = $request["allowcomment"]?1:0;
        $item->status = $request["status"]?1:0;
        $item->created_by = $this->adminId;
        $item->save();
        
        Session::flash("msg","s: تمت عملية الاضافة بنجاح");
        
        return redirect("/admin/article/create");
    }

    public function edit($id)
    {
        $item = Article::find($id);
        if($item == NULL || $item->isdelete){
            Session::flash("msg","e: الرجاء التأكد من الرابط المطلوب");
            return redirect("/admin/article");
        }
		$categories = Category::all();
        return view("admin.article.edit",compact("item","categories"));
    }
    public function status($id)
    {
        //sleep(1);
        $item = Article::find($id);
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
    
    public function allowcomment($id)
    {
        $item = Article::find($id);
        if($item == NULL || $item->isdelete){     
            return response()->json([
                'status' => '0',
                'msg' => 'لم تتم العملية'
            ]);
        }
        $item->allowcomment = !$item->allowcomment;  
        $item->save();
        return response()->json([
            'status' => '1',
            'msg' => 'تمت العملية بنجاح'
        ]);
    }

    public function update(ArticleRequest $request, $id)
    {

        $item = Article::find($id);
        $item->title = $request["title"];
		$item->summary = $request["summary"];
		$item->details = $request["details"];
		$item->publish_date = date("Y-m-d", strtotime($request["publish_date"]));
		$item->category_id = $request["category_id"];
		$item->image = $request["image"];
		$item->allowcomment = $request["allowcomment"]?1:0;
        $item->status = $request["status"]?1:0;
        $item->updated_by = $this->adminId;
        $item->save();
        
        Session::flash("msg","i: تمت عملية الحفظ بنجاح");
        
        return redirect("/admin/article");
    }
    public function destroy($id)
    {
         $item = Article::find($id);
         $item->isdelete=1;
         $item->updated_by=$this->adminId;
         $item->save();
        
         Session::flash("msg","w: تمت عملية الحذف بنجاح");
        
         return redirect("/admin/article");
    }
}