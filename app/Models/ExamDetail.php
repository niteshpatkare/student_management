<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_id', 'stud_id', 'sub_id'
    ];
}
