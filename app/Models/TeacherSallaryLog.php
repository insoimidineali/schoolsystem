<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSallaryLog extends Model
{

public function stream()
        {
            return $this->belongsTo(StudentStream::class, 'stream_id', 'id');
        } 
}
