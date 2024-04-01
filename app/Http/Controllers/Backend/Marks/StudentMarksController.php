<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;
// use App\Models\StudentStream;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentStream;
use App\Models\Terms;
use App\Models\StudentMarks;
use App\Models\StudentClass;
use App\Models\AssignSubject;
use App\Models\ExamType;
use App\Models\AssignStudent;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Spatie\PdfProtect\PdfProtect;
// use Barryvdh\DomPDF\Facade\Pdf;
use ZanySoft\LaravelPDF\PDF;


class StudentMarksController extends Controller
{
    //
    public function StudentMarksView(){


    	return view('backend.student.studentMarks.student_Marks_view');

    }

    public function GetStudentMarks(Request $request){
    	$id_number = $request-> id_number;
    	$allData = StudentMarks::with(['student'])->where('id_number',$id_number)->get();
    	return response()->json($allData);

    }

}
