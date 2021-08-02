@extends("admin._layout")

@section("title")
تعديل المستخدم
@endsection

@section("content")
<form action="/admin/admin/{{$item->id}}" method="post" class="form-horizontal">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="put" />
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">اسم االمستخدم</label>
    <div class="col-sm-10 col-md-5">
      <input autofocus type="text" class="form-control" value="{{$item->name}}" id="name" name="name" placeholder="ادخل اسم المستخدم">
    </div>
  </div>
    <div class="form-group">
    <label for="name" class="col-sm-2 control-label">ايميل االمستخدم</label>
    <div class="col-sm-10 col-md-5">
      <input  type="text" class="form-control" value="{{$item->email}}" id="email" name="email" placeholder="ادخل اايميل المستخدم">
    </div>
  </div>
    
    <div class="form-group">
    <label for="password" class="col-sm-2 control-label"> كلمة المرور</label>
    <div class="col-sm-10 col-md-5">
      <input type="password" class="form-control" value="{{old('password')}}" id="password" name="password" placeholder="ادخل كلمة المرور للمستخدم">
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
        <a href="/admin/admin" class="btn btn-default">الغاء الامر</a>
    </div>
  </div>
</form>
@endsection

