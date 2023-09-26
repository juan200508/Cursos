<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // Reference table on Database
    // Help with tabine
    protected $table = 'services';

    // Reference columns on Database
    protected $fillable = [
        'name',
        'description',
        'star_date',
        'end_date',
        'status',
        'category_id',
        'user_id',
    ];

    // Relationship with Inscriptions HasMany
    // Help with tabine
    public function inscriptions()
    {
        return $this->hasMany('App\Models\Inscription', 'service_id', 'id');
    }

    // Relationship with Inscriptions Belong to
    // Help with tabine
    public function category()
    {
        return $this->belongsTo('App\Models\ServiceCategory', 'category_id', 'id');
    }


}
