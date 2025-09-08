<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dashboard extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'organization_id', 'config', 'is_public'];

    protected $casts = [
        'config' => 'array',
        'is_public' => 'boolean',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
