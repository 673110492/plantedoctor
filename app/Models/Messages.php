<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;
    protected $fillable = ['forum_id', 'user_id', 'content'];

    public function forum() {
        return $this->belongsTo(Forum::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
