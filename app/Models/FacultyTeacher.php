<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyTeacher extends Model
{
    use HasFactory;
    protected $fillable=['faculty_id','teacher_id'];
    
    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
}
