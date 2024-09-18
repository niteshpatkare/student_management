<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ExamDetail;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exams';

    protected $fillable = [
        'exam_name', 'exam_code','teacher', 'department', 'exam_type', 
        'exam_date', 'exam_time', 'duration', 'location', 'max_marks', 'passing_marks', 
        'instructions', 'status', 'sub_id'
    ];

    public function examsdetailHasMany(): HasMany
    {
        return $this->hasMany(ExamDetail::class, 'id', 'exam_id');
    }
    

    
}
