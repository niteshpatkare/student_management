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
        'exam_name', 'exam_code', 'department', 'exam_type', 
        'exam_date', 'exam_time', 'max_marks', 'passing_marks', 
        'instructions', 'status', 'is_active'
    ];

    public function examsdetailHasMany(): HasMany
    {
        return $this->hasMany(ExamDetail::class, 'id', 'exam_id');
    }
    

    
}
