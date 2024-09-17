<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Teacher;
use App\Models\ExamDetail;
 

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['sub_name','teach_id', 'is_active'];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teach_id', 'id');
    }

    public function examdetail(): HasMany
    {
        return $this->hasMany(ExamDetail::class, 'id', 'sub_id');
    }
}
