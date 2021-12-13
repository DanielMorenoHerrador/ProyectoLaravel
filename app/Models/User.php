<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class User extends Model
{
    use HasFactory, Notifiable, CrudTrait;

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
