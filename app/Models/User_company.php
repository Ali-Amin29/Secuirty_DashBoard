<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_company extends Model
{
    use HasFactory;
    protected $fillable=['user_id','event_id','company_id','jopSearch_id'];

    protected $table= "user_companies";

    public function userName()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function companyName()
    {
        return $this->belongsTo(Company::class,'company_id','id');
    }

}