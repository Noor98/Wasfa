@extends("admin._layout")

@section("title")
تعديل شريحة
@endsection


@section("content")
<form action="/admin/slider/{{$item->id}}" method="post" class="form-horizontal">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="put" />
  <div class="form-group">
    <label for="title" class="col-sm-2 control-label">عنوان الشريحة </label>
    <div class="col-sm-10 col-md-5">
      <input autofocus type="text" class="form-control" value="{{$item->title}}" id="title" name="title" placeholder="ادخل عنوان الشريحة">
    </div>
  </div>
    <div class="form-group">
    <label for="url" class="col-sm-2 control-label">الرابط </label>
    <div class="col-sm-10 col-md-5">
      <input type="text" class="form-control" value="{{$item->url}}" id="url" name="url" placeholder="ادخل الرابط">
    </div>
  </div>
  <div class="form-group">
    <label for="summary" class="col-sm-2 control-label">ملخص الشريحة </label>
    <div class="col-sm-10 col-md-10">
        <textarea  id="summary" rows="3" name="summary" placeholder="ادخل ملخص الشريحة" class="form-control">{{$item->summary}}</textarea>
    </div>
  </div>
<div class="form-group">
    <label for="image" class="col-sm-2 control-label">صورة الشريحة</label>
    <div class="col-sm-10 col-md-5">
        <input type="file" value="{{$item->image}}" id="image" name="image" />
    </div>
  </div> 
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input {{$item->status?"checked":""}} name="status" type="checkbox"> فعال
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">حفظ</button>
        <a href="/admin/slider" class="btn btn-default">الغاء الامر</a>
    </div>
  </div>
</form>
@endsection