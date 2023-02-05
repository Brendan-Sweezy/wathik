<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrgnization extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = [];

    function orgnization()
    {
        return $this->belongsTo(Orgnization::class);
    }
    function user()
    {
        return $this->belongsTo(User::class);
    }
}
