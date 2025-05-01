<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'completed',
        'user_id',
    ];

    // the attributes that should be cast.
    protected $casts = [
        'completed' => 'boolean',
    ];

    //get the user that owns the todo .
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
