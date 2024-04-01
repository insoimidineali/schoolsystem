<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentMarks;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\MarksGrade;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;


class MarkSheetController extends Controller
{
    public function MarkSheetView(){

    	$data['years'] = StudentYear::orderBy('id','ASC')->get();
    	$data['classes'] = StudentClass::all();
    	$data['exam_type'] = ExamType::all();
    	return view('backend.report.marksheet.marksheet_view',$data);

    }


    public function MarkSheetGet(Request $request){

    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
    	$examTyp_id = $request->examTyp_id;
    	$id_number = $request->id_number;

    $count_fail = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('examTyp_id',$examTyp_id)->where('id_number',$id_number)->where('marks','<','33')->get()->count();
    	// dd($count_fail);
    $singleStudent = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('examTyp_id',$examTyp_id)->where('id_number',$id_number)->first();
    if ($singleStudent == true) {

    $allMarks = StudentMarks::with(['assign_subject','student_year'])->where('year_id',$year_id)->where('class_id',$class_id)->where('examTyp_id',$examTyp_id)->where('id_number',$id_number)->get();
    	// dd($allMarks->toArray());

      // Récupérer tous les sujets associés à la classe sélectionnée
    //   $subjects = SchoolSubject::whereHas('assign_subject', function ($query) use ($class_id) {
    //     $query->where('class_id', $class_id);
    // })->get();

    // $subjects = AssignSubject::where('class_id', $class_id)->with('school_subject')->get()->pluck('school_subject');
    $subjects = AssignSubject::where('class_id', $class_id)->with('school_subject')->get();


    $allGrades = MarksGrade::all();
    return view('backend.report.marksheet.marksheet_pdf',compact('allMarks','allGrades','count_fail','subjects'));

    }else{

    	$notification = array(
    		'message' => 'Sorry These Criteria Donse not match',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);
       }


    } // end Method





}
