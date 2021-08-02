@extends("admin._layout")

@section("title")
الوصفات
@endsection
@section("subtitle")
يمكنك اضافة حذف وتعديل الوصفات
@endsection

@section("css")
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="/metronic/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="/metronic/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="/metronic/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="/metronic/assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
@endsection

@section("content")
<form class="row">
    <div class="col-sm-2">
        <input autofocus value="{{$q}}" type="text" class="form-control" name="q" placeholder="ادخل كلمة البحث" />
    </div>
	<div class="col-sm-2">
        <input value="{{$publish_date}}" type="text" class="form-control date-picker" name="publish_date" placeholder="تاريخ النشر" />
    </div>
	<div class="col-sm-2">
        <select name="category_id" id="category_id" class="form-control">
            <option value="">اختيار التصنيف</option>
            @foreach($categories as $c)
                <option {{$c->id==$category_id?"selected":""}} value="{{$c->id}}">{{$c->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-2">
        <select name="status" class="form-control">
            <option value="">جميع الحالات</option>
            <option {{$status=='1'?"selected":""}} value="1">فعال</option>
            <option {{$status=='0'?"selected":""}} value="0">غير فعال</option>
        </select>
    </div>
    <div class="col-sm-2">
        <input type="submit" value="انطلق" class="btn btn-primary" />
    </div>

    <div class="col-sm-2">
        <a class="btn btn-success pull-right" href="/admin/article/create">
            <i class="fa fa-plus"></i> اضافة وصفة جديد</a>
    </div>
</form>
@if($items->count()>0)
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th width="5%">الصورة</th>
            <th>عنوان الوصفة</th>
			<th width="10%">تاريخ النشر</th>
			<th width="10%">التصنيف</th>
			<th width="12%">مسموح التعليق</th>
			<th width="10%">حالة الوصفة</th>
            <th width="15%">آخر تعديل</th>
            <th width="10%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $a)
        <tr>
            <td><img width="50" alt="wasfa image" src="/storage/images/{{$a->image}}" /></td>
            <td>{{$a->title}}</td>
			<td>{{ date("Y-m-d", strtotime($a->publish_date))}}</td>
			<td>{{$a->category->name}}</td>
			<td><input type="checkbox" value="{{$a->id}}" class='allowcomment'  {{$a->allowcomment?"checked":""}} /></td>
            <td><input type="checkbox" value="{{$a->id}}" class='cbStatus' {{$a->status?"checked":""}} /></td>
            <td>{{$a->created_at}}</td>
            <td>
                <a href="/admin/article/{{$a->id}}/edit" class="btn btn-xs btn-primary">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>
                <a href="/admin/article/{{$a->id}}/delete" class="btn Confirm btn-xs btn-danger">
                    <i class="glyphicon glyphicon-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else

<br>
<div class="alert alert-warning"><b>نأسف</b>, لا يوجد بيانات لعرضها ...</div>
@endif
{{$items->links()}}

@endsection

@section("js")
 <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="/metronic/assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="/metronic/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="/metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="/metronic/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="/metronic/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="/metronic/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="/metronic/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="/metronic/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>

<script>
        $(function(){
            $(".cbStatus").click(function(){
                var id = $(this).val();
                 //alert(id);
                $.get("/admin/article/"+id+"/status");
            });
        });
    </script>

<script>
        $(function(){
            $(".allowcomment").click(function(){
                var id = $(this).val();
                $.get("/admin/article/"+id+"/allowcomment");
            });
        });
    </script>

 
        <!-- END PAGE LEVEL SCRIPTS -->
@endsection
