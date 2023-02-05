<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = [];

    function project()
    {
        return $this->belongsTo(Project::class);
    }
}
