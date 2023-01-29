@extends('DashBoard.layout.master')
@section('name')
    اضافه ايفنت
    <i class="fa-solid fa-home"></i>
@endsection
@section('content')
    <form action="{{ route('rooms.update', $rooms->id) }}" method="post" enctype="multipart/form-data" class="was-validated">
        @csrf
        {{ method_field('PUT') }}

        <div class="form-group">
            <label for="exampleInputEmail1">الاسم</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="ادخل اسم الايفنت" value="{{ $rooms->name }}" name="name" required>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">العدد</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="ادخل اسم الايفنت" value="{{ $rooms->number }}" name="Number_Avilable" required>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">الاسم</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="img">
        </div>


        </div>




        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
