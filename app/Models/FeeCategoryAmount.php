<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategoryAmount extends Model
{
    public function fee_category(){
        return $this->belongsTo(FeeCategory::class,'fee_category_id', 'id');
    }
                                                //table
    public function student_class(){          //fee_category_amount et l'Id de Student_class = id
        return $this->belongsTo(StudentClass::class,"class_id", 'id');
    }


    // public function Class(){
    //     return $this->belongsTo(StudentClass::class, 'class_id','id');
    // }
    public function Year(){
        return $this->belongsTo(StudentYear::class, 'year_id','id');
    }


}
