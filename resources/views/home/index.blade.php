@extends('home.layouts.app')

@section('content')

<img style=" position: relative;
    right: 15%; width:957px; height:253px; " src="images/capture3.png">
<br><br>

<div class="container">
     
    <div class="row">
            @foreach($top8Articles as $a)
        <div class="col-md-3 col-sm-6">
        <div class="card">
          <img  class="card-img-top" src="/thumb.php?size=436x270&src=./storage/images/{{$a->image}}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{$a->title}}</h5>
            <a target="_blank" href="/home/article/{{$a->id}}" >اقرأ المزيد</a>
          </div>
        </div>
            <br>
        </div>
        @endforeach

    </div>
</div>
@endsection

@section("js")

<!-- <script>
function welcome(){
       alert('welcome to our website *_^');

}
    welcome();
</script> -->
@endsection
