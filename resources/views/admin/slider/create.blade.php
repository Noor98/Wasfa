@extends("admin._layout")

@section("title")
اضافة شريحة جديد
@endsection


@section("content")
<form action="/admin/slider" enctype="multipart/form-data"  method="post" class="form-horizontal">
    {{csrf_field()}}
  <div class="form-group">
    <label for="title" class="col-sm-2 control-label">عنوان الشريحة </label>
    <div class="col-sm-10 col-md-5">
      <input autofocus type="text" class="form-control" value="{{old('title')}}" id="title" name="title" placeholder="ادخل عنوان الشريحة">
    </div>
  </div>
    <div class="form-group">
    <label for="url" class="col-sm-2 control-label">الرابط </label>
    <div class="col-sm-10 col-md-5">
      <input type="text" class="form-control" value="{{old('url')}}" id="url" name="url" placeholder="ادخل الرابط">
    </div>
  </div>
  <div class="form-group">
    <label for="summary" class="col-sm-2 control-label">ملخص الشريحة </label>
    <div class="col-sm-10 col-md-10">
        <textarea  id="summary" rows="3" name="summary" placeholder="ادخل ملخص الشريحة" class="form-control">{{old('details')}}</textarea>
    </div>
  </div>
<div class="form-group">
    <label for="image" class="col-sm-2 control-label">صورة الشريحة</label>
    <div class="col-sm-10 col-md-5">
      <input type="file" name="image" />
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
        <a href="/admin/slider" class="btn btn-default">الغاء الامر</a>
    </div>
  </div>
</form>
@endsection

