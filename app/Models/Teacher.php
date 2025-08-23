<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
   protected $fillable = ['name', 'age'];

    public function faculty()
    {
        return $this->belongsToMany(Faculty::class, 'faculty_teachers');
    }
}
