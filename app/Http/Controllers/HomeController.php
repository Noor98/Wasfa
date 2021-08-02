<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Article;

use App\Comment;
use App\Category;
use Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::where("isdelete",0)->where("status",1)
            ->limit(3)->orderBy("created_at","desc")->get();
        
        $top8Articles = Article::where("isdelete",0)->where("status",1)
            ->limit(12)->orderBy("created_at","desc")->get();
        return view('home.index',compact('sliders','top8Articles'));
    }
    public function articles()
    {
        $q=request()["q"];
		$category_id=request()["category_id"];
        $items = Article::whereRaw(" isdelete=0 and status=1 ");
        if($q!=NULL)
            $items->whereRaw("(title like ?)",["%$q%"]);
		if($category_id!=NULL)
            $items->whereRaw("category_id = ?",[$category_id]);
        
        $items = $items->paginate(10)->appends(["q"=>$q,"category_id"=>$category_id]);
		$categories = Category::all();
        return view("home.articles",compact("items","categories","q","category_id"));
    }
    public function article($id)
    {
        $article = Article::find($id);
        if($article==NULL || !$article->status || $article->isdelete)
            return redirect('/');
        return view('home.article',compact('article'));
    }
    
    public function postcomment($id,Request $request)
    {
        //dd($id);
        $request->validate([
            'comment' => 'required|max:255'
        ]);
        $comment= new Comment();
        $comment->comment=$request["comment"];
        $comment->article_id=$id;
        $comment->user_id=Auth::user()->id;
        $comment->status=1;
        $comment->save();
        
        
        Session::flash("msg","s: تمت عملية الاضافة بنجاح");
        return redirect("/home/article/$id");
    }
}
