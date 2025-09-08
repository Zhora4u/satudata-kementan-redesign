<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'path', 'disk', 'collection', 'mime_type', 'size', 'meta'];

    protected $casts = [
        'meta' => 'array',
    ];

    public function model()
    {
        return $this->morphTo();
    }
}
