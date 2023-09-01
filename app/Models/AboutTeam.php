<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AboutTeam extends Model
{
    use HasFactory,SoftDeletes;


//add SoftDeletes


    protected $fillable=['name','profession','discription','image'];
}

