@extends('DashBoard.layout.master')
@section('name')
    اضافه صورة الشركة
    <i class="fa-solid fa-home"></i>
@endsection
@section('content')
    <form action={{ route('rooms.store') }} method="post" enctype="multipart/form-data">
        @csrf
        <label for="basic-url"> ادخل اسم الغرفه</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="name"
                placeholder="قم بأدخال اسم الغرفه ">
        </div>
        <div class="form-group mt-2">
            <label for="exampleInputEmail1">الصوره</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="img"
                placeholder="قم بأدخال الصورة ">
        </div>

        <label for="basic-url"> ادخل العدد المتاح</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="Number_Avilable"
                placeholder="قم بأدخال العدد المتاح ">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">تأكيد</button>
    </form>
@endsection
