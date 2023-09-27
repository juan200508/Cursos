<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;

    // Reference table on Database
    // Help with tabine
    protected $table = "degrees";

    // Reference columns on Database
    protected $fillable = [
        'name',
    ];

    // Relationship with Applicant HasMany
    public function applicants()
    {
        return $this->hasMany('App\Models\Applicant', 'degree_id', 'id');
    }
}
