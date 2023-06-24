<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserToDo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_todo_list';

    protected $fillable = [
        'user_id',
        'user_droid_id',
        'text',
        'completed'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userDroid()
    {
        return $this->belongsTo(UserDroid::class, 'user_droid_id');
    }
}
