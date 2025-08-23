<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $fillable=['name'];
public function teachers()
{
    return $this->belongsToMany(Teacher::class, 'faculty_teachers');
}
}
