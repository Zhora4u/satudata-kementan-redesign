<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataSource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'source_type',
        'organization_id',
        'commodity_id',
        'url',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function commodity()
    {
        return $this->belongsTo(Commodity::class);
    }
}