@extends('DashBoard.layout.master')
@section('name')
    صفحه الملتقي
    <i class="fa-solid fa-home"></i>
@endsection
@section('content')
    @if (session()->has('massage'))
        <div class="alert alert-success">
            {{ session()->get('massage') }}
        </div>
    @endif
    <table class="table table-hover ">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>الصوره</th>

                <th> العدد المتاح</th>
                <th>عدد التسجيل</th>
                <th>الاكشن</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($rooms as $room)
                <tr>

                    <td>{{ $room->id }}</td>
                    <td><img src="{{ asset('Room/' . $room->img) }}" alt="dd" width="70px" height="60px"
                            style="border-radius: 50px"></td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->number }}</td>
                    <td>{{ $room->enter }}</td>







                    <td>
                        <form action="{{ route('rooms.show', $room->id) }}" style="display: inline">
                            <button class="btn btn-warning">
                                <i class="fa-sharp fa-solid fa-eye"></i> </button>
                        </form>

                        <form action="{{ route('rooms.edit', $room->id) }}" style="display: inline">
                            <button class="btn btn-primary">
                                <i class="fa-solid fa-wrench"></i>
                            </button>
                        </form>
                        {{-- dangerdangerdangerdangerdangerdangerdangerdangerdangerdangerdangerdangerdanger --}}

                        <form action="{{ route('rooms.destroy', $room->id) }}" style="display: inline" method="post">
                            {{ method_field('DELETE') }}

                            @csrf


                            <button class="btn btn-danger my_button" id="button_delete" value="{{ $room->id }}">
                                <i class="fa-sharp fa-solid fa-trash"></i>
                            </button>
                        </form>
                        <form action="{{ route('rooms.destroyall', $room->id) }}" style="display: inline" method="post">
                            {{ method_field('DELETE') }}

                            @csrf


                            <button class="btn btn-danger my_button" id="button_delete" value="{{ $room->id }}">
                                <i class="fa-sharp fa-solid fa-trash"></i>
                            </button>
                        </form>
                        {{-- هات كل الشركات اللي مشتركه ف الايفنت --}}


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
