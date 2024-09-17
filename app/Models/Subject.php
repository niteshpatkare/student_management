<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Teacher;
use App\Models\Exam as ExamModel;
 

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['sub_name', 'is_active'];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function exams(): HasMany
    {
        return $this->hasMany(ExamModel::class);
    }
}
