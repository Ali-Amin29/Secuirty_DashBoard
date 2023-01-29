<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 class Company extends Model
{
    use HasFactory;
    protected $fillable=['representive','brief','user_id','img','name','event','AvailabilityWork','numberJoin','numberAvailiable','place','work'];

   protected $table = "companies";

}