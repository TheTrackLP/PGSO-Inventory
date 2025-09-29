<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Establishment extends Model
{
    protected $guarded = [];

    public function users(){
        $this->belongsToMany(User::class);
    }
}