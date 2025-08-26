<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyTeacher extends Model
{
    use HasFactory;
    protected $fillable=['faculty_id','teacher_id'];

   
}
