@extends("admin._layout")

@section("title")
اضافة تصنيف جديد
@endsection

@section("content")
<form action="/admin/category" method="post" class="form-horizontal">
    {{csrf_field()}}
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">اسم التصنيف</label>
    <div class="col-sm-10 col-md-5">
      <input autofocus type="text"  class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="ادخل اسم التصنيف">
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
        <a href="/admin/category" class="btn btn-default">الغاء الامر</a>
    </div>
  </div>
</form>
@endsection



