<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'created_by','photo'];

    public function members()
    {
        return $this->belongsToMany(User::class, 'forum_user');
    }

     public function users()
    {
        return $this->belongsToMany(User::class, 'forum_user')->withTimestamps();
    }


   

    public function messages()
    {
        return $this->hasMany(Messages::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


}
