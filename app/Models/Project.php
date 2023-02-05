<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = [];

    function orgnization()
    {
        return $this->belongsTo(Orgnization::class);
    }

    function events()
    {
        return $this->hasMany(Event::class);
    }

    function threats()
    {
        return $this->hasMany(ProjectThreat::class);
    }

    function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
