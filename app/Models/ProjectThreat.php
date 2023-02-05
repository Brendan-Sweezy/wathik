<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectThreat extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['threat'];
    function threat()
    {
        return $this->belongsTo(Threat::class);
    }
    function project()
    {
        return $this->belongsTo(Project::class);
    }
}
