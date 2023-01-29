<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms=Room::get();
        return view('DashBoard.Room.index',compact('rooms'));
     }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('DashBoard.Room.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->img)
        {
            $img=time(). '.'.$request->img->extension();

            $request->img->move(public_path('Room'),$img);
        }

        $rooms=Room::create([
            "name" => $request->name,
            "number" => $request->Number_Avilable,
            'img'=>$img,
        ]);
        return  redirect()->route('rooms.index')->with('massage','تم اضافه الغرفه بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rooms=Room::find($id);
        return view('DashBoard.Room.show',compact('rooms'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rooms=room::find($id);
        return view('DashBoard.Room.update',compact('rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rooms=room::find($id);
        if($request->img)
        {
            $img=time(). '.'.$request->img->extension();

            $request->img->move(public_path('Room'),$img);
        }else{
            $img=$rooms->img;
        }


        $rooms->update([
            "name" => $request->name,
            "number" => $request->Number_Avilable,
            'img'=>$img,

        ]);
        return redirect()->route('rooms.index')->with('massage', 'تم التعديل الغرفه بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Attendance::where('id_room',$id)->delete();
        $Company=Room::find($id)->delete();
        return redirect()->back()->with('massage',"تم الحذف بنجاح");

    }
    public function destroyall($id)
    {
        Attendance::where('id_room',$id)->delete();
        return redirect()->back()->with('massage',"تم الحذف بنجاح");
    }
}