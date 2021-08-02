@extends("admin._layout")

@section("title")
صلاحيات المستخدم
@endsection

@section("content")
<form action="/admin/admin/{{$item->id}}/setpermission" method="post" class="form-horizontal">
    {{csrf_field()}}
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label"></label>
    <div class="col-sm-10 col-md-5">
       <?php     
            $topLinks=\DB::table("link")->where("parent_id",0)->get();
        ?>
        <ul class="list-unstyled">
        @foreach($topLinks as $topLink)
        <?php                            
            $subLinks=\DB::table("link")->where("parent_id",$topLink->id)->get();
            $hasPermission =  $item->links->where("id",$topLink->id)->count();
        ?>
            <li>
            <label><input class="cbPermission" {{$hasPermission?'checked':''}} type="checkbox" value="{{$topLink->id}}" name="permission[]" /> <b>{{$topLink->title}}</b></label>
                <ul class="list-unstyled">
                    @foreach($subLinks as $subLink)
                    
                    <li>
            <label><input class="cbPermission" {{$item->links->where("id",$subLink->id)->count()?'checked':''}} type="checkbox" value="{{$subLink->id}}" name="permission[]" /> {{$subLink->title}}</label>
                    </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
        </ul>
    </div>
  </div>
    
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">حفظ</button>
        <a href="/admin/admin" class="btn btn-default">الغاء الامر</a>
    </div>
  </div>
</form>
@endsection

@section("js")
        <script>
            $(function(){
                $(".cbPermission").click(function(){
                    $(this).parent().next().find(":checkbox")
                        .prop("checked",$(this).prop("checked"));                    
                    var checkedValue = $(this).closest("ul").find(":checked").size()>0;
                    $(this).closest("ul").prev().find(":checkbox")
                    .prop("checked",checkedValue)
                });
            });
        </script>
@endsection