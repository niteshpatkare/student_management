<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['sub_name', 'is_active'];

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class, 'id', 'sub_id');
    }
}
