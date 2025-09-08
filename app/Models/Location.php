<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'code', 'latitude', 'longitude', 'meta'];

    protected $casts = [
        'meta' => 'array',
    ];

    public function datasets()
    {
        return $this->hasMany(Dataset::class);
    }
}
