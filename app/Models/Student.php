<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exam as ExamModel;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','address','mobile_no'];

    public function examsHasMany(): HasMany
    {
        return $this->hasMany(ExamModel::class);
    }
}
