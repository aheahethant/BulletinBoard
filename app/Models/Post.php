<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'create_user_id',
        'updated_user_id',
    ];

    public function getUserName()
    {
        return User::where('id', $this->create_user_id)->first()->name;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'foreign_key');
    }
}
