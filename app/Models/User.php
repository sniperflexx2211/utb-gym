<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Un usuario (trainer) tiene un perfil de entrenador (One-to-One)
    public function trainer() {
        return $this->hasOne(Trainer::class);
    }

    // Un usuario (client) se inscribe a muchas clases (Many-to-Many)
    public function enrollments() {
        return $this->hasMany(Enrollment::class);
    }

    // Un usuario hace muchos comentarios
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}