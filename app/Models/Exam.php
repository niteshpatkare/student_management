<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Subject as SubjectModel;
use App\Models\Student as StudentModel;


class Exam extends Model
{
    use HasFactory;
    protected $table = 'exams';

    protected $fillable = [
        'exam_name', 'exam_code', 'subject', 'teacher', 'department', 'exam_type', 
        'exam_date', 'exam_time', 'duration', 'location', 'max_marks', 'passing_marks', 
        'instructions', 'status', 'sub_id'
    ];
    

    public function subjectBelongsTo(): BelongsTo
    {
        return $this->belongsTo(SubjectModel::class);
    }

    public function studentBelongsTo(): BelongsTo
    {
        return $this->belongsTo(StudentModel::class);
    }
}
