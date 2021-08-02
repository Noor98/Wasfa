@extends("admin._layout")

@section("title")
اضافة وصفة جديد
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
<form action="/admin/article" enctype="multipart/form-data" method="post" class="form-horizontal">
    {{csrf_field()}}
  <div class="form-group">
    <label for="title" class="col-sm-2 control-label">اسم الوصفة </label>
    <div class="col-sm-10 col-md-5">
      <input autofocus type="text" class="form-control" value="{{old('title')}}" id="title" name="title" placeholder="ادخل اسم الوصفة">
    </div>
  </div>
  <div class="form-group">
    <label for="summary" class="col-sm-2 control-label">مقادير الوصفة </label>
    <div class="col-sm-10 col-md-10">
        <textarea  id="summary" rows="3" name="summary" placeholder="ادخل مقادير الوصفة" class="form-control">{{old('summary')}}</textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="details" class="col-sm-2 control-label">طريقة الوصفة </label>
    <div class="col-sm-10 col-md-10">
        <textarea  id="details" rows="7" name="details" placeholder="ادخل طريقة الوصفة" class="form-control">{{old('details')}}</textarea>
    </div>
  </div> 
  <div class="form-group">
    <label for="publish_date" class="col-sm-2 control-label">تاريخ النشر </label>
    <div class="col-sm-10 col-md-5">
      <input type="text" class="form-control form-control-inline input-medium date-picker" value="{{old('publish_date')}}" id="publish_date" name="publish_date" placeholder="ادخل ناريخ النشر">
    </div>
  </div>   
  <div class="form-group">
    <label for="category_id" class="col-sm-2 control-label">التصنيف</label>
    <div class="col-sm-5">
        <select required name="category_id" id="category_id" class="form-control">
            <option value="">اختيار التصنيف</option>
            @foreach($categories as $c)
                <option {{$c->id==old('category_id')?"selected":""}} value="{{$c->id}}">{{$c->name}}</option>
            @endforeach
        </select>
    </div>
  </div>
<div class="form-group">
    <label for="image" class="col-sm-2 control-label">صورة الوصفة</label>
    <div class="col-sm-10 col-md-5">
      <input type="file" name="image" />
    </div>
  </div> 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input {{old('allowcomment')?"checked":""}} name="allowcomment" type="checkbox"> مسموح التعليق
        </label>
      </div>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input {{old('status')?"checked":""}} name="status" type="checkbox"> فعال
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">اضافة</button>
        <a href="/admin/article" class="btn btn-default">الغاء الامر</a>
    </div>
  </div>
</form>
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
        <!-- END PAGE LEVEL SCRIPTS -->
@endsection