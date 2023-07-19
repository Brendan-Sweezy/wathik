<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orgnization extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = [
        'contacts',
        'manager',
        'address',
        'info'
    ];
    function user()
    {
        return $this->hasOne(UserOrgnization::class);
    }
    function projects()
    {
        return $this->hasMany(Project::class);
    }
    function members()
    {
        return $this->hasMany(Member::class);
    }
    function financingEntities()
    {
        return $this->hasMany(FinancingEntity::class);
    }
    function contacts()
    {
        return $this->hasMany(OrgnizationContact::class);
    }
    function address()
    {
        return $this->hasOne(OrgnizationAddress::class);
    }
    function manager()
    {
        return $this->hasOne(OrgnizationManager::class);
    }
    function authorityMeetings()
    {
        return $this->hasMany(AuthorityMeeting::class);
    }
    function info()
    {
        return $this->hasMany(OrgnizationInfo::class);
    }
    function employees()
    {
        return $this->hasMany(Employee::class);
    }
    function branch()
    {
        return $this->hasMany(Branch::class);
    }
}
