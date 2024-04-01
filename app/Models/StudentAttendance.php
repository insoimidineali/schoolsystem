<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    public function user(){
        //student_d is the id of the table student_attendance
        return $this->belongsTo(User::class, "student_id");
    }
    public function Attendanceclaas(){
        //student_d is the id of the table student_attendance
        return $this->belongsTo(StudentClass::class, "class_id");
    }

}
