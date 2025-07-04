<?php

namespace App\Models;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'jabatan',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => UserRole::class, // Jika menggunakan Enum
    ];

    // Helper methods untuk check role
    public function isAdmin(): bool
    {
        return $this->role === UserRole::ADMIN;
    }

    public function isKaryawan(): bool
    {
        return $this->role === UserRole::KARYAWAN;
    }

    public function isUser(): bool
    {
        return $this->role === UserRole::USER;
    }
}
