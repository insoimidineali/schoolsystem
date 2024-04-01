<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model

// {{-- term = semester, and Stream = department --}}

{
    public function student_class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
    public function assignSubject(){          // assign_subjects[class_id] et l'Id de Student_class = id
        return $this->belongsTo(AssignSubject::class,"stream_id", 'id');
    }
    // detail function to display the subject (link to suject and assignsubject table )
    public function school_subject(){          // assign_subjects[class_id] et l'Id de Student_class = id
        return $this->belongsTo(SchoolSubject::class,"subject_id", 'id');
    }

    public function school_department(){          // assign_subjects[class_id] et l'Id de Student_class = id
        return $this->belongsTo(StudentStream::class,"stream_id", 'id');
    }

    public function MarkGrade(){          // assign_subjects[class_id] et l'Id de Student_class = id
        return $this->belongsTo(MarksGrade::class,"marks_grades_id", 'id');
    }


}
