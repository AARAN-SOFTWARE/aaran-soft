<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return in_array($this->email, [
            'sundar@sundar.com',
            'sundar@codexsun.com',
            'jagadeesh@aaran.org',
            'divya@aaran.org',
        ]);
    }

    public function isEditor(): bool
    {
        return in_array($this->email, [
            'sundar@sundar.com',
            'jagadeesh@aaran.org',
            'divya@aaran.org',
            'kalaiyarasan@aaran.org',
        ]);
    }

    public function isEntry(): bool
    {
        return in_array($this->email, [
            'office@aaran.com',
            'sundar@sundar.com',
            'jagadeesh@aaran.org',
            'divya@aaran.org',
            'kalaiyarasan@aaran.org',

        ]);
    }

    public function isMagalir(): bool
    {
        return in_array($this->email, [
            'sundar@sundar.com',
            'jagadeesh@aaran.org',
            'divya@aaran.org',
            'kalaiyarasan@aaran.org',

        ]);
    }

    public function isSupervisor(): bool
    {
        return in_array($this->email, [
            'sundar@sundar.com',
            'jagadeesh@aaran.org',
            'divya@aaran.org',
            'kalaiyarasan@aaran.org',

        ]);
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new TenantScope);
    }
}
