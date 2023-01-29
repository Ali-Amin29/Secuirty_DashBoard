@extends('DashBoard.layout.master')
@section('name')
    الصفحه الرئيسيه
    <i class="fa-solid fa-home"></i>
@endsection
@section('content')
    <h1>
        Expected
        {{ $wordlist }}
    </h1>
    <h1>
        Attendence Now
        {{ $room1Attend }}
    </h1>
    <h1>
        Attendence Exist
        {{ $room1Exist }}
    </h1>
    <h1>
        Attendence All
        {{ $allComming }}
    </h1>
@endsection
