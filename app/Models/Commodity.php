<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commodity extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'category', 'description', 'meta'];

    protected $casts = [
        'meta' => 'array',
    ];

    public function datasets()
    {
        return $this->hasMany(Dataset::class);
    }
}
