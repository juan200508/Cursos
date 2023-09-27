<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    // Reference table on Database
    // Help with tabine
    protected $table = 'applicants';

    // Reference columns on Database
    protected $fillable = [
        'document',
        'gender',
        'social_class',
        'birth_date',
        'address',
        'degree_id',
        'user_id'
    ];

    // Relationship with User One to One
    public function user(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    // Relationship with Degree Belongs to
    // Help with tabine
    public function degree(){
        return $this->belongsTo('App\Models\Degree', 'degree_id', 'id');
    }

    // Relationship with Inscription Many to Many
    public function inscriptions()
    {
        return $this->belongsToMany('App\Models\Inscription', 'inscriptions_applicants', 'applicant_id', 'inscription_id');
    }
}
