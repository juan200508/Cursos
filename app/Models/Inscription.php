<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    // Reference table on Database
    // Help with tabine
    protected $table = 'inscriptions';

    // Reference columns on Database
    protected $fillable = [
        'service_id',
        'inscription_date'
    ];

    // Relationship with Service Belongs to
    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id', 'id');
    }

    // Relationship with applicant Many to Many
    public function applicants()
    {
        return $this->belongsToMany('App\Models\Applicant', 'inscriptions_applicants', 'inscription_id', 'applicant_id');
    }
}
