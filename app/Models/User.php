<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // JWT: get the identifier that will be stored in the token subject claim
    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    // JWT: return a key value array, containing any custom claims
    public function getJWTCustomClaims(): array
    {
        return [];
    }

    // Relationships
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
