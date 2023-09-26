<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    // Reference table on Database
    // Help with tabine
    protected $table = 'roles';

    // Reference columns on Database
    protected $fillable = [
        'name'
    ];

    // Relationship with User HasMany
    public function users()
    {
        return $this->hasMany('App\Models\User', 'role_id', 'id');
    }
}
