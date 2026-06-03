<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'specialization', 'bio', 'hourly_rate'];

    public function user() { return $this->belongsTo(User::class); }
    
    // One-to-Many: Un entrenador da muchas clases
    public function gymClasses() { return $this->hasMany(GymClass::class); }
    
    // Polimórfico: Un entrenador puede tener imágenes
    public function images() { return $this->morphMany(Image::class, 'imageable'); }
}