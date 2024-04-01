<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use App\Models\StudentYear;
// use App\Models\StudentStream;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentStream;
use App\Models\TeacherSallaryLog;
use App\Models\Terms;
use Illuminate\Support\Facades\DB;
// use Barryvdh\DomPDF\PDF as DomPDFPDF;
// use Spatie\PdfProtect\PdfProtect;
// use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\Facade\Pdf as PDF;




class StudentRegController extends Controller
{
    public function StudentRegisView(){
    	$data['years'] = StudentYear::all();
    	$data['streams'] = StudentStream::all();
        $data["classes"] = StudentClass::all();
        $data['year_id'] = StudentYear::orderBy('id','asc')->first()->id;
    	$data['stream_id'] = StudentStream::orderBy('id','asc')->first()->id;

        $assignStudents = AssignStudent::with(['student', 'year', 'stream', 'class', 'shift'])
        ->whereHas('student', function ($query) {
            $query->where('usertype', 'Student');
        })->get();
        $data['allData'] = $assignStudents->map(function ($assignStudent) {
            return [
                'student' => $assignStudent->student,
                'year' => $assignStudent->year,
                'stream' => $assignStudent->stream,
                'class' => $assignStudent->class,
                'shift' => $assignStudent->shift,
            ];
        });

        return view('backend.student.student_reg.student_view',$data);

    }


    public function StudentYearStreamWise(Request $request){
    	$data['years'] = StudentYear::all();
    	$data['streams'] = StudentStream::all();
        $data['classes'] = StudentClass::all();
    	$data['year_id'] = $request->year_id;
    	$data['stream_id'] = $request->stream_id;
    	$data['allData'] = AssignStudent::where('year_id',$request->year_id)->where('stream_id',$request->stream_id)->get();
    	return view('backend.student.student_reg.student_view',$data);

    }


    public function StudentRegisAdd(){
    	$data['years'] = StudentYear::all();
    	$data['streams'] = StudentStream::all();
        $data["classes"] = StudentClass::all();
    	// $data['terms'] = Terms::all();
    	$data['shifts'] = StudentShift::all();
    	return view('backend.student.student_reg.student_add',$data);
    }


    public function StudentRegStore(Request $request){
    	DB::transaction(function() use($request){
    	$checkYear = StudentYear::find($request->year_id)->name;
    	$student = User::where('usertype','Student')->orderBy('id','DESC')->first();
            // Generating of Student ID
    	if ($student == null) {
    		$firstReg = 0;
    		$studentId = $firstReg+1;
    		if ($studentId < 10) {
    			$id_no = '000'.$studentId;
    		}elseif ($studentId < 100) {
    			$id_no = '00'.$studentId;
    		}elseif ($studentId < 1000) {
    			$id_no = '0'.$studentId;
    		}
    	}else{
     $student = User::where('usertype','Student')->orderBy('id','DESC')->first()->id;
     	$studentId = $student+1;
     	if ($studentId < 10) {
    			$id_no = '000'.$studentId;
    		}elseif ($studentId < 100) {
    			$id_no = '00'.$studentId;
    		}elseif ($studentId < 1000) {
    			$id_no = '0'.$studentId;
    		}

    	} // end else

    	$final_id_no = $checkYear.$id_no;
    	$user = new User();
    	$code = rand(00000,99999);
    	$user->id_number  = $final_id_no;
    	$user->password = bcrypt($code);
    	$user->usertype = 'Student';
    	$user->code = $code;
    	$user->name = $request->name;
    	$user->fathername = $request->fathername;
    	$user->mothername = $request->mothername;
    	$user->mobile = $request->mobile;
        $user->email = $request->email;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->religion = $request->religion;
    	$user->birthday = date('Y-m-d',strtotime($request->birthday));

    	if ($request->file('images')) {
    		$file = $request->file('images');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/student_images'),$filename);
    		$user['images'] = $filename;
    	}
 	    $user->save();

          $assign_student = new AssignStudent();
          $assign_student->student_id = $user->id;
          $assign_student->year_id = $request->year_id;
          $assign_student->stream_id = $request->stream_id;
          $assign_student->class_id = $request->class_id;
          $assign_student->shift_id = $request->shift_id;
          $assign_student->save();

          $discount_student = new DiscountStudent();
          $discount_student->assign_student_id = $assign_student->id;
          $discount_student->fee_category_id = '1';
          $discount_student->discount = $request->discount;
          $discount_student->save();

    	});


    	$notification = array(
    		'message' => 'Student Registration Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.registration.view')->with($notification);

    } // End Method



    public function StudentRegEdit($student_id){
        $data['years'] = StudentYear::all();
    	$data['streams'] = StudentStream::all();
    	$data['classes'] = StudentClass::all();
    	$data['shifts'] = StudentShift::all();

    	$data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
    	// dd($data['editData']->toArray());
    	return view('backend.student.student_reg.student_edit',$data);

    }




 public function StudentRegUpdate(Request $request,$student_id){
    	DB::transaction(function() use($request,$student_id){



    	$user = User::where('id',$student_id)->first();
    	$user->name = $request->name;
    	$user->fathername = $request->fathername;
    	$user->mothername = $request->mothername;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->religion = $request->religion;

    	$user->birthday = date('Y-m-d',strtotime($request->birthday));

    	if ($request->file('images')) {
    		$file = $request->file('images');
    		@unlink(public_path('upload/user_images/'.$user->images));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/user_images'),$filename);
    		$user['images'] = $filename;
    	}
 	    $user->save();

          $assign_student = AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();

          $assign_student->student_id = $user->id;
          $assign_student->year_id = $request->year_id;
          $assign_student->stream_id = $request->stream_id;
          $assign_student->class_id = $request->class_id;
          $assign_student->shift_id = $request->shift_id;
          $assign_student->save();

          $discount_student = DiscountStudent::where('assign_student_id',$request->id)->first();

          $discount_student->discount = $request->discount;
          $discount_student->save();

    	});


    	$notification = array(
    		'message' => 'Student Registration Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.registration.view')->with($notification);

    } // End Method


    public function StudentRegPromotion($student_id){
    	$data['years'] = StudentYear::all();
    	$data['streams'] = StudentStream::all();
    	$data['classes'] = StudentClass::all();
    	$data['shifts'] = StudentShift::all();

    	$data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
    	// dd($data['editData']->toArray());
    	return view('backend.student.student_reg.student_promotion',$data);

    }




 public function StudentUpdatePromotion(Request $request,$student_id){
    DB::transaction(function() use($request,$student_id){



    	$user = User::where('id',$student_id)->first();
    	$user->name = $request->name;
    	$user->fathername = $request->fathername;
    	$user->fathername = $request->mothername;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->religion = $request->religion;

    	$user->birthday = date('Y-m-d',strtotime($request->birthday));

    	if ($request->file('images')) {
    		$file = $request->file('images');
    		@unlink(public_path('upload/user_images/'.$user->images));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/user_images'),$filename);
    		$user['images'] = $filename;
    	}
 	    $user->save();

          $assign_student =new AssignStudent();

          $assign_student->student_id = $student_id;
          $assign_student->year_id = $request->year_id;
          $assign_student->stream_id = $request->stream_id;
          $assign_student->class_id = $request->class_id;
          $assign_student->shift_id = $request->shift_id;
          $assign_student->save();

          $discount_student = new DiscountStudent();
          $discount_student->assign_student_id = $assign_student->id;
          $discount_student->fee_category_id = '1';
          $discount_student->discount = $request->discount;
          $discount_student->save();

    	});


    	$notification = array(
    		'message' => 'Student  Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.registration.view')->with($notification);

    }
    // End Method



    // public function StudentRegDetails($student_id){
    //     $data['details'] = AssignStudent::with(['student', 'Year', 'Stream'])
    //     ->where('year_id',$data['year_id'])
    //     ->where('stream_id',$data['stream_id'])
    //  $data['details'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();

    // $pdf = PDF::loadView('backend.student.student_reg.student_details_pdf', $data);
	// $pdf->SetProtection(['copy', 'print'], '', 'pass');
	// return $pdf->stream('document.pdf');
        function StudentRegDetails($student_id) {
                //  $data['years'] = StudentYear::all();
                //  $data['class'] = StudentClass::all();
    	        //  $data['year_id'] = StudentYear::orderBy('id','asc')->first()->id;
    	        //  $data['stream_id'] = StudentStream::orderBy('id','asc')->first()->id;
                 $data['allData'] = AssignStudent::with(['student', 'Year', 'Stream',"Class","Shift"])
                //  ->where('year_id',$data['year_id'])
                //  ->where('stream_id',$data['stream_id'])
                 ->first();

                //  $data['details'] = User::find($student_id);
                // $pdf = new PDF();
                $pdf= PDF::loadView('backend.student.student_reg.student_details_pdf', $data);
                return $pdf->stream('document.pdf');
    }


    // }





}
