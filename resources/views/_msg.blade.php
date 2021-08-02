@if(Session::get("msg")!=NULL)
<?php
    $msg = Session::get("msg");
    $msgClass = "alert-info";
    $f2l=strtolower(substr($msg,0,2));
    if($f2l=='s:'){
        $msg = substr($msg,2);
        $msgClass = "alert-success";
    }
    else if($f2l=='e:'){
        $msg = substr($msg,2);
        $msgClass = "alert-danger";
    }
    else if($f2l=='w:'){
        $msg = substr($msg,2);
        $msgClass = "alert-warning";
    }
    else if($f2l=='i:'){
        $msg = substr($msg,2);
        $msgClass = "alert-info";
    }
?>
<div class="alert {{$msgClass}} alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{$msg}}
</div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif