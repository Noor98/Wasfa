@extends('home.layouts.app')
@section('content')

<div class="container">
    <h1 id="title">{{$article->title}}</h1>
    <div class="row">
        <div class="col-md-7" style="background-color:ghostwhite">
            {!!str_replace("\n",'<br>',$article->summary)!!}
        </div>
        
        <div class="col-md-5">
            <img class="img-fluid" src="/thumb.php?size=445x275&src=./storage/images/{{$article->image}}">
        </div>
        
        <div class="col-md-7" style="background-color:ghostwhite">
            {!!str_replace("\n",'<br>','<br>')!!}
        </div>
        
        <div class="col-md-7" style="background-color:ghostwhite">
            {!!str_replace("\n",'<br>',$article->details)!!}
        </div>
        
    </div>
    <br>
    <br>
    <h2 style="color:rebeccapurple">التعليقات</h2>
    @if($article->comments->count()>0)
        @foreach($article->comments as $c)
            <div class="media" style="background-color:ghostwhite">
              <div class="media-body"><span class="float-right">{{$c->created_at}}</span>
                <h5 class="mt-0">{{$c->user->name}}</h5>
                {{$c->comment}}
              </div>
            </div>
            <hr>
        @endforeach
    @endif
    @if($article->allowcomment)
    @guest
    <div class="jumbotron">
  <h3>لاضافة تعليقك</h3>
    <p>يجب ان تكون عضو مسجل لدينا للتسجيل 
        
        <a href="/register">اضغط هنا</a>
        </p>
</div>
    @else
    <form method="post" action="/home/article/{{$article->id}}">
        {{csrf_field()}}
    <div class="form-group">
    <label for="comment">اترك لنا تعليقك</label>
        @include("_msg")
    <textarea maxlength="255" class="form-control" id="comment" name="comment" rows="3">{{old("comment")}}</textarea>
  </div>
        <button style="background-color:rebeccapurple" >موافق</button>
    </form>
    @endguest
    @endif
</div>
@endsection
