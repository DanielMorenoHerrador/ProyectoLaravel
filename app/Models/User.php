<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory, Notifiables;

    //
    protected $fillable = [
        'email', 'name', 'password'
    ];

    protected $hidden = ['password'];

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }
}
