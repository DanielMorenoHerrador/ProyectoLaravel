<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User','idusuario','id');
    }
    public function party()
    {
        return $this->belongsTo('App\Models\Party','idparty','id');
    }
}
