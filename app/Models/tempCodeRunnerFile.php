<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Exam as ExamModel;
use App\Models\Subject as SubjectModel;
use App\Models\Student as StudentModel;

class ExamDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_id', 'stud_id', 'sub_id'
    ];

    public function examBelongsTo(): BelongsTo
    {
        return $this->belongsTo(ExamModel::class, 'exam_id', 'id');
    }

    public function subjectBelongsTo(): BelongsTo
    {
        return $this->belongsTo(SubjectModel::class, 'sub_id', 'id');
    }

    public function studentBelongsTo(): BelongsTo
    {
        return $this->belongsTo(StudentModel::class, 'stud_id', 'id');
    }
}