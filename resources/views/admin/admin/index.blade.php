@extends("admin._layout")

@section("title")
المستخدمين
@endsection
@section("subtitle")
يمكنك اضافة حذف وتعديل المستخدمين
@endsection


@section("content")


<form class="row">
    <div class="col-sm-3">
        <input autofocus value="{{$q}}" type="text" class="form-control" name="q" placeholder="ادخل اسم المستخدم" />
    </div>
    <div class="col-sm-2">
         <input  value="{{$email}}" type="text" class="form-control" name="email" placeholder="اادخل ايميل المستخدم" />
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
    <div class="col-sm-3">
        <a class="btn btn-success pull-right" href="/admin/admin/create">
            <i class="fa fa-plus"></i> اضافة مستخدم جديد</a>
    </div>
</form>
@if($items->count()>0)
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>اسم المستخدم</th>
            <th>البريد الالكتروني</th>
            <th width="10%">الحالة</th>
            <th width="15%">آخر تعديل</th>
            <th width="15%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $a)
        <tr>
            <td>{{$a->name}}</td>
            <td>{{$a->email}}</td>
            <td><input type="checkbox" class='cbStatus' {{$a->status?"checked":""}} /></td>
            <td>{{$a->created_at}}</td>
            <td>
                <a href="/admin/admin/{{$a->id}}/edit" class="btn btn-xs btn-primary">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>
                <a href="/admin/admin/{{$a->id}}/permission" class="btn btn-xs btn-warning">
                    <i class="glyphicon glyphicon-lock"></i>
                </a>
                <a href="/admin/admin/{{$a->id}}/delete" class="btn Confirm btn-xs btn-danger">
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

