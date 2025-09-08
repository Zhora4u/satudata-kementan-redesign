<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * User Model
 *
 * Represents a user in the application, extending Laravel's Authenticatable class.
 * Handles authentication, API tokens, notifications, and relationships with roles and media.
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Mass assignable attributes.
     */
    private const FILLABLE_ATTRIBUTES = [
        'name',
        'email',
        'password',
    ];

    /**
     * Hidden attributes for serialization.
     */
    private const HIDDEN_ATTRIBUTES = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casts.
     */
    private const CAST_ATTRIBUTES = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = self::FILLABLE_ATTRIBUTES;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = self::HIDDEN_ATTRIBUTES;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = self::CAST_ATTRIBUTES;

    /**
     * Define the many-to-many relationship with roles.
     *
     * @return BelongsToMany<Role>
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Define the polymorphic relationship with media.
     *
     * @return MorphMany<Media>
     */
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }

    /**
     * Check if the user has a specific role.
     *
     * @param string $roleName
     * @return bool
     */
    public function hasRole(string $roleName): bool
    {
        try {
            return $this->roles()->where('name', $roleName)->exists();
        } catch (\Exception $e) {
            // Log error or handle as needed
            return false;
        }
    }

    /**
     * Get the user's full name or fallback to email.
     *
     * @return string
     */
    public function getDisplayNameAttribute(): string
    {
        return $this->name ?: $this->email;
    }
}
