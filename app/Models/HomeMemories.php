<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeMemories extends Model
{
    use HasFactory;
    protected $fillable=['title','discription','image'];
}
