@extends('home.layouts.app')
@section('content')
<div class="container">
    <h1 id="title">الوصفات</h1>

<form class="row">
    <div class="col-sm-4">
        <input autofocus value="{{$q}}" type="text" class="form-control" name="q" placeholder="ادخل كلمة البحث" />
    </div>
	<div class="col-sm-4">
        <select name="category_id" id="category_id" class="form-control">
            <option value="">اختيار التصنيف</option>
            @foreach($categories as $c)
                <option {{$c->id==$category_id?"selected":""}} value="{{$c->id}}">{{$c->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-4">
        <input type="submit" value="انطلق" class="btn btn-primary" />
    </div>
</form>

   <hr>
     @foreach($items as $a)
    <div class="card">
        <div class="row">
            <div class="col-3"><img class="img-fluid" src="/thumb.php?size=436x270&src=./storage/images/{{$a->image}}"></div>
            <div class="col-9">
            <h5 class="card-title">{{$a->title}}</h5>
                <label class="badge  badge-info">{{$a->category->name}}</label>
                <br><br>
                <a href="/home/article/{{$a->id}}">اقرأ المزيد</a>
            </div>
        </div>
    </div>
        <br><br>
    @endforeach
    
    {{$items->links()}}
</div>
@endsection
