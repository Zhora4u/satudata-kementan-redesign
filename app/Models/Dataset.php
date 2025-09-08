<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dataset extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'commodity_id',
        'location_id',
        'title',
        'summary',
        'data_meta',
        'file_path',
        'source',
        'observed_at',
        'tags'
    ];

    protected $casts = [
        'data_meta' => 'array',
        'tags' => 'array',
        'observed_at' => 'date',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function commodity()
    {
        return $this->belongsTo(Commodity::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'model');
    }
}
