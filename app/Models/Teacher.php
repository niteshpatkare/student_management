<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject as SubjectModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'qualification',
        'department',
        'hire_date',
        'status',
    ];

    public function subjects(): HasMany
    {
        return $this->hasMany(SubjectModel::class, 'id', 'teach_id');
    }
}
