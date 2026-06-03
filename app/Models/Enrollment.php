<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'gym_class_id', 'enrollment_date', 'status'];

    public function user() { return $this->belongsTo(User::class); }
    public function gymClass() { return $this->belongsTo(GymClass::class); }
}