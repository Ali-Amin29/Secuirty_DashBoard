@extends('DashBoard.layout.master')

@section('name')
    صفحه الملتقي
    <i class="fa-solid fa-home"></i>
@endsection
@section('content')
    <div class="col-sm-12">

        الاسم :
        <br>
        {{ $rooms->name }}
        <hr>
    </div>

    <div class="col-sm-12">

        صوره الغرفه
        <br>

        <img src="{{ asset('Room/' . $rooms->img) }}" alt="dd" width="100px" height="100px">

        <hr>
    </div>




    <div class="col-sm-12">

        العدد المسموح بيه
        <br>

        {{ $rooms->number }}


        <hr>
    </div>

    <div class="col-sm-12">

        العدد الذي سجل حتي الان
        <br>

        {{ $rooms->enter }}


        <hr>
    </div>



    {{-- </div> --}}
@endsection
