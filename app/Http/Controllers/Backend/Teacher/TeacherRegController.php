<?php

namespace App\Http\Controllers\Backend\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
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
use Spatie\PdfProtect\PDFPasswordProtect;
// use PDF;

// use DevRaeph\PDFPasswordProtect\PDFPasswordProtect;
// use Owenoj\PDFPasswordProtect\PDFPasswordProtectServiceProvider;
class TeacherRegController extends Controller
{

    public function TeacherView(){

    	$teachers = User::where('usertype', 'Teacher')->get();
         $teacherSallaryLogs = TeacherSallaryLog::with('stream')->get();
         $data['allData'] = $teachers->map(function ($teacher) use ($teacherSallaryLogs) {
            $teacherSallaryLog = $teacherSallaryLogs->where('teacher_id', $teacher->id)->first();

            return [
                'teacher' => $teacher,
                'teacherSallaryLog' => $teacherSallaryLog,
            ];
        });


        	// dd($data['allData']);



        $data['years'] = StudentYear::all();
    	$data['Streams'] = StudentStream::all();
        $data["teacherSallaryLog"] = TeacherSallaryLog::all();

    	return view('backend.teacher.teacher_reg.teacher_view',$data);
    }


    public function TeacherAdd(){
        $data['designation'] = Designation::all();
        $data['years'] = StudentYear::all();
    	$data['streams'] = StudentStream::all();
    	$data['terms'] = Terms::all();
    	return view('backend.teacher.teacher_reg.teacher_add',$data);
    }




    public function TeacherStore(Request $request){
    	DB::transaction(function() use($request){
    	$checkYear = date('Ym',strtotime($request->join_date));
    	// dd($checkYear);
    	$teacher = User::where('usertype','Teacher')->orderBy('id','DESC')->first();

    	if ($teacher == null) {
    		$firstReg = 0;
    		$teacherId = $firstReg+1;
    		if ($teacherId < 10) {
    			$id_number = '000'.$teacherId;
    		}elseif ($teacherId < 100) {
    			$id_number = '00'.$teacherId;
    		}elseif ($teacherId < 1000) {
    			$id_number = '0'.$teacherId;
    		}
    	}else{
     $teacher = User::where('usertype','Teacher')->orderBy('id','DESC')->first()->id;
     	$teacherId = $teacher+1;
     	if ($teacherId < 10) {
    			$id_number = '000'.$teacherId;
    		}elseif ($teacherId < 100) {
    			$id_number = '00'.$teacherId;
    		}elseif ($teacherId < 1000) {
    			$id_number = '0'.$teacherId;
    		}

    	} // end else

    	$final_id_no = $checkYear.$id_number;
    	$user = new User();
    	$code = rand(00000,99999);
    	$user->id_number = $final_id_no;
    	$user->password = bcrypt($code);
    	$user->usertype = 'Teacher';
    	$user->code = $code;
    	$user->name = $request->name;
    	$user->fathername = $request->fathername;
    	$user->mothername = $request->mothername;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
        $user->email = $request->email;
    	$user->religion = $request->religion;
    	$user->salary = $request->salary;
    	$user->designation_id = $request->designation_id;
    	$user->birthday = date('Y-m-d',strtotime($request->birhday));
    	$user->join_date = date('Y-m-d',strtotime($request->join_date));

    	if ($request->file('images')) {
    		$file = $request->file('images');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/teachers_images'),$filename);
    		$user['images'] = $filename;
    	}
 	    $user->save();

          $teacher_salary = new TeacherSallaryLog();
          $teacher_salary->teacher_id = $user->id;
          $teacher_salary->stream_id = $request->stream_id;
          $teacher_salary->effected_salary = date('Y-m-d',strtotime($request->join_date));
          $teacher_salary->privious_salary = $request->salary;
          $teacher_salary->present_salary = $request->salary;
          $teacher_salary->increment_salary = (int) '0';
          $teacher_salary->save();

    	});


    	$notification = array(
    		'message' => 'Teacher Registration Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('teacher.registration.view')->with($notification);

    } // END Method




    public function TeacherRegEdit($id){
        $data['years'] = StudentYear::all();
    	$data['streams'] = StudentStream::all();
        $data["TeacherStream"] = TeacherSallaryLog::all();
    	$data['editData'] = User::find($id);
    	$data['designation'] = Designation::all();

    	return view('backend.teacher.teacher_reg.teacher_edit',$data);

    }


    public function TeacherRegUpdate(Request $request, $id){


            $user = User::find($id);
            $user->name = $request->name;
            $user->fathername = $request->fathername;
            $user->mothername = $request->mothername;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->email = $request->email;
            $user->religion = $request->religion;
            $user->salary = $request->salary;
            $user->designation_id = $request->designation_id;
            $user->birthday = date('Y-m-d',strtotime($request->birhday));

            if ($request->file('images')) {
                $file = $request->file('images');
                @unlink(public_path("upload/teachers_images/".$user->images));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/teachers_images'),$filename);
                $user['images'] = $filename;
            }
             $user->save();

            //   $teacher_salary = new TeacherSallaryLog();
            //   $teacher_salary->teacher_id = $user->id;
            //   $teacher_salary->stream_id = $request->stream_id;
            //   $teacher_salary->effected_salary = date('Y-m-d',strtotime($request->join_date));
            //   $teacher_salary->privious_salary = $request->salary;
            //   $teacher_salary->present_salary = $request->salary;
            //   $teacher_salary->increment_salary = (int) '0';
            //   $teacher_salary->save();




            $notification = array(
                'message' => 'Teacher Registration Update Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('teacher.registration.view')->with($notification);


    }// END METHOD



    // public function TacherRegDetail($id){
    // 	$data['details'] = User::find($id);
    // $pdf = PDF::loadView('backend.teacher.teacher_reg.teacher_details_pdf', $data);
    // $pdfProtect = new PdfProtect($pdf);
    // }
    function TeacherRegDetail($id) {
        $data['details'] = User::find($id);
        $pdf = new PDF();
        $pdf->loadView('backend.teacher.teacher_reg.teacher_details_pdf', $data);
        return $pdf->stream('document.pdf');
    }



}
