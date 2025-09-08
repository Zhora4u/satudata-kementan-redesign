<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'description', 'website', 'email', 'phone', 'meta'];

    protected $casts = [
        'meta' => 'array',
    ];

    public function datasets()
    {
        return $this->hasMany(Dataset::class);
    }

    public function dashboards()
    {
        return $this->hasMany(Dashboard::class);
    }
}
