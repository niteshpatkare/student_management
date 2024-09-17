<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ExamDetail;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','address','mobile_no'];

    public function examsdetailHasMany(): HasMany
    {
        return $this->hasMany(ExamDetail::class, 'id', 'stud_id');
    }
}
