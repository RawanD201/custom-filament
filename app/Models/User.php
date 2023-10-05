<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\HasName;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser, HasName

{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    public function canAccessFilament(): bool
    {
        return $this->is_active;
    }

    public function getFilamentName(): string
    {
        return $this->fullname;
    }

    protected $fillable = [
        'fullname',
        'username',
        'password',
        'birthday',
        'phone',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     */
    protected $casts = [
        'birthday' => 'date',
    ];
}
