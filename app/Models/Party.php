<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    protected $table = 'Partys';

    protected $fillable = [
        'name', 'gameId'
    ];

    public function messages() {

        return $this->hasMany('App\Models\Message');

    }

}
