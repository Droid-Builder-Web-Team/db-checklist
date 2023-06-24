<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainframeDroid extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mainframe_droids';

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'display_image',
        'version'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
