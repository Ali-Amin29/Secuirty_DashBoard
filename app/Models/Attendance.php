<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendence';
    protected $fillable=['id_user','id_room'];

    public function room()
    {
        return $this->belongsTo(Room::class,'id_room','id');
    }
    public function user()
    {
        return $this->belongsTo(User_company::class,'id_user','user_id');
    }
}
