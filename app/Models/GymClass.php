<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymClass extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'trainer_id', 'category_id', 'capacity', 'start_time', 'end_time', 'day'];

    public function trainer() { return $this->belongsTo(Trainer::class); }
    public function category() { return $this->belongsTo(Category::class); }

    // Many-to-Many: Una clase tiene muchos usuarios inscritos
    public function users() {
        return $this->belongsToMany(User::class, 'enrollments')->withPivot('status')->withTimestamps();
    }

    // Polimórfico
    public function comments() { return $this->morphMany(Comment::class, 'commentable'); }
    public function images() { return $this->morphMany(Image::class, 'imageable'); }
}