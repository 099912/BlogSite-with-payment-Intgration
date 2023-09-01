<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chat;
class UserVerify extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'token',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chat()
    {
        return $this->hasMany(Chat::class, 'user_id');
    }


}
