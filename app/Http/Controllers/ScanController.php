<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Room;
use App\Models\User;
use App\Models\User_company;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function Scan(Request $request)
{


    $qr_code=$request->user;
    $room_id=$request->room;
    // get user Existing
    // search in table user
    $user=User::where('qr_code',$qr_code)->first();
    $user_attend = Attendance::where('id_user', $user->id)->first();

// not found in user table
if(empty($user))
{
   return redirect()->back()->with('massage','هذه الشخص غير مسجل في الوقع ') ;
}
elseif(isset($user_attend->id_user) == $user->id  &&  $user_attend->id_room == +$room_id )
{
    Attendance::where('id_user',$user->id)->delete();

            $room = Room::find($room_id);
            if(isset($room->exist) == null  )
            {
                $room->exist = 1;
                if(isset($room->Attend) == null  )
                {
                    $room->Attend = 0;
                }
                else
                {
                    // dd($room->Attend);
                    $room->Attend -= 1;
                }

                $room->update();
                return redirect()->back()->with('massage','هذه الشخص تم حذفه ') ;
            }
            elseif(isset($room->id) == $room_id)
            {
                $room->exist += 1;
                if(isset($room->Attend) == null  )
                {
                    $room->Attend = 0;
                }
                else
                {
                    // dd($room->Attend);
                    $room->Attend -= 1;
                }
                $room->update();
                return redirect()->back()->with('massage','هذه الشخص تم حذفه ') ;
            }

}
else
// if fount table and not found in user_compain
{
    $user_id=$user->id;
    $User_companys=User_company::where('user_id',$user_id)->first();

    if(empty($User_companys))
    {
        return redirect()->back()->with('massage','هذه الشخص مسجل ف الموقع لكنه  غير مسجل في  المواتمر ') ;
    }else{

    return $this->store_secirity($user_id ,$room_id);
    }
}
}





        public function store_secirity($user_id,$room_id)
        {
            $user_attend = Attendance::where('id_user', $user_id)->first();
        // dd($user_attend->id_room,+$room_id,$user_attend->id_user,$user_id);
            $room=Room::find($room_id);
          if($room->number > $room->Attend )
          {
            if(isset($user_attend) == null)
            {
                $attend = Attendance::create(
                    [
                        'id_user' => $user_id,
                        'id_room' => $room_id
                    ]
             );
             $attend->save();
             if(isset($room->Attend) == null && isset($user_attend->id_user) != $user_id  )
             {
                 $room->Attend =1;
                 $room->update();
                 return redirect()->back()->with('massage','done') ;
             }

             else{
                 $room->Attend +=1;
                 $room->update();
                 return redirect()->back()->with('massage','done') ;
             }
            }
            elseif(isset($user_attend->id_user) != $user_id)
            {
             $attend = Attendance::create(
                    [
                        'id_user' => $user_id,
                        'id_room' => $room_id
                    ]
             );
             $attend->save();
             if(isset($room->Attend) == null && isset($user_attend->id_user) != $user_id  )
             {
                 $room->Attend =1;
                 $room->update();
                 return redirect()->back()->with('massage','done') ;
             }

             else{
                 $room->Attend +=1;
                 $room->update();
                 return redirect()->back()->with('massage','done') ;
             }
             }
             elseif(isset($user_attend->id_user) == $user_id  &&  $user_attend->id_room == +$room_id )
             {
                 return redirect()->back()->with('massage','هذه الشخص مسجل في القاعة سابقا ') ;
             }
             elseif( isset($user_attend->id_user) == $user_id  &&  $user_attend->id_room != +$room_id )
             {
                 return redirect()->back()->with('massage','هذه الشخص مسجل في القاعة اخري ') ;
             }

          }
          else
          {
            return redirect()->back()->with('massage','هذه القاعة ممتلئة ') ;
          }
        }
}