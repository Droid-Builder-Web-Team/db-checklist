<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDroid extends Model
{
    use HasFactory;

    protected $table = 'user_droids';

    protected $fillable = [
        'user_id',
        'mainframe_droid_id'
    ];

    public function userToDo()
    {
        return $this->hasMany(UserToDo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mainframeDroid()
    {
        return $this->belongsTo(MainframeDroid::class, 'mainframe_droid_id');
    }
}
