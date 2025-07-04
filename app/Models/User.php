<?php

namespace App\Models;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
<<<<<<< HEAD

    use HasFactory, Notifiable;


=======
    use HasFactory, Notifiable;

>>>>>>> 27ca99ff36b1739de23f1058add85d419d0b18bb
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
