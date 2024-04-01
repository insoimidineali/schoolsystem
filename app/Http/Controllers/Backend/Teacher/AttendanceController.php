<?php

namespace App\Http\Controllers\Backend\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentAttendance;
use App\Models\User;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentShift;
use App\Models\StudentStream;
use App\Models\Terms;
use Illuminate\Support\Facades\DB;
use App\Models\Designation;
use App\Models\TeacherSallaryLog;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Spatie\PdfProtect\PdfProtect;
// use Barryvdh\DomPDF\Facade\Pdf;
use ZanySoft\LaravelPDF\PDF;
use Illuminate\Support\Carbon;
use Spatie\PdfProtect\PDFPasswordProtect;
class AttendanceController extends Controller
{
    //
    public function StudentAttendanceView(){

        $data['allData'] = StudentAttendance::select('date')->groupBy('date')->orderBy('id','DESC')->get();
    	// $data['allData'] = EmployeeAttendance::orderBy('id','DESC')->get();
    	return view('backend.teacher.student_attendance.student_attendance_view',$data);
    }

    public function GetStudentList(Request $request){
        $class_id = $request->class_id;
        // $students = User::where('usertype', 'Student')->where('class_id', $class_id)->get();
        $students = DB::table('users')
                    ->join('student_attendances', 'users.id', '=', 'student_attendances.student_id')
                    ->where('users.usertype', 'Student')
                    ->where('student_attendances.class_id', $class_id)
                    ->select('users.*')
                    ->distinct()
                    ->get();
                    $classes = StudentClass::all();
                    $data['students'] = $students;
                    $data['classes'] = $classes;
                    // dd($students );
        // return response()->json($students);
    	return view('backend.teacher.student_attendance.student_attendance_add', $data);


    }

    public function StudentAttendanceAdd(){
    	$data['Student'] = User::where('usertype','Student')->get();
    	$data['classes'] = StudentClass::all();
    	return view('backend.teacher.student_attendance.student_attendance_add',$data);

    }


    public function StudentStoreAttendance(Request $request){

    	StudentAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
    	$counteStudent = count($request->student_id);
    	for ($i=0; $i <$counteStudent ; $i++) {
    		$attend_status = 'attend_status'.$i;
    		$attend = new StudentAttendance();
    		$attend->date = date('Y-m-d',strtotime($request->date));
    		$attend->student_id = $request->student_id[$i];
    		$attend->attend_status = $request->$attend_status;
    		$attend->save();
    	} // end For Loop

 		$notification = array(
    		'message' => 'Student Attendace Data Update Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.attendance.view')->with($notification);

    } // end Method



    public function StudentAttendanceEdit($date){
    	$data['editData'] = StudentAttendance::where('date',$date)->get();
        // dd($data['editData']);
    	$data['student'] = User::where('usertype','Student')->get();
    	return view('backend.teacher.student_attendance.student_attendance_edit',$data);
    }


    public function StudentAttendanceDetails($date){
    	$data['details'] = StudentAttendance::where('date',$date)->get();
    	return view('backend.teacher.student_attendance.student_attendance_details',$data);

    }
}

