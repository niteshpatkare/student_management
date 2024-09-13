<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exam';

    protected $fillable = [
        'exam_name', 'exam_code', 'subject', 'teacher', 'department', 'exam_type', 
        'exam_date', 'exam_time', 'duration', 'location', 'max_marks', 'passing_marks', 
        'instructions', 'status'
    ];
}
