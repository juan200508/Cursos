<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    // Reference table on Database
    // Help with tabine
    protected $table = 'services_category';

    // Reference columns on Database
    protected $fillable = [
        'name'
    ];

    // Relationship with Service HasMany
    // Help with tabine
    public function services()
    {
        return $this->hasMany('App\Models\service', 'category_id', 'id');
    }


}
