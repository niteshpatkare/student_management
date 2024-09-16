<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exams';

    protected $fillable = [
        'exam_name', 'exam_code', 'subject', 'teacher', 'department', 'exam_type', 
        'exam_date', 'exam_time', 'duration', 'location', 'max_marks', 'passing_marks', 
        'instructions', 'status', 'sub_id'
    ];
    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class, 'sub_id', 'id' );
    }
}
