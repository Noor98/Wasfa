@extends("admin._layout")

@section("title")
التعليقات
@endsection
@section("subtitle")
يمكنك حذف وتفعيل التعليقات
@endsection


@section("content")
<form class="row">
    <div class="col-sm-2">
        <input autofocus value="{{$q}}" type="text" class="form-control" name="q" placeholder="ادخل كلمة البحث" />
    </div>
    <div class="col-sm-2">
        <select name="status" class="form-control">
            <option value="">جميع الحالات</option>
            <option {{$status=='1'?"selected":""}} value="1">فعال</option>
            <option {{$status=='0'?"selected":""}} value="0">غير فعال</option>
        </select>
    </div>
    <div class="col-sm-6">
        <input type="submit" value="انطلق" class="btn btn-primary" />
    </div>

</form>
@if($items->count()>0)
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>التعليق </th>
			<th width="25%">الوصفة</th>
            <th width="10%">الحالة</th>
            <th width="15%">آخر تعديل</th>
            <th width="5%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $a)
        <tr>
            <td>{{$a->comment}}</td>
            <td>{{$a->article->title}}</td>
            <td><input type="checkbox" class='cbStatus' {{$a->status?"checked":""}} /></td>
            <td>{{$a->created_at}}</td>
            <td>
                <a href="/admin/comment/{{$a->id}}/delete" class="btn Confirm btn-xs btn-danger">
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
