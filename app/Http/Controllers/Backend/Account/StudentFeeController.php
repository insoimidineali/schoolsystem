<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\FeeCategoryAmount;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\ExamType;
use DB;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


use App\Models\AccountStudentFee;
use App\Models\FeeCategory;

class StudentFeeController extends Controller
{
    public function StudentFeeView(){

    	$data['allData'] = AccountStudentFee::all();
    	return view('backend.account.student_fee.student_fee_view',$data);
    }


    public function StudentFeeAdd(){
    	$data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
    	$data['fee_categories'] = FeeCategory::all();
    	return view('backend.account.student_fee.student_fee_add',$data);

    }


    public function RegFeeClassData(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if ($year_id !='') {
            $where[] = ['year_id','like',$year_id.'%'];
        }
        if ($class_id !='') {
            $where[] = ['class_id','like',$class_id.'%'];
        }
        $allStudent = AssignStudent::with(['discount'])->where($where)->get();
        dd($allStudent);
        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Roll No</th>';
        $html['thsource'] .= '<th>Reg Fee</th>';
        $html['thsource'] .= '<th>Discount </th>';
        $html['thsource'] .= '<th>Student Fee </th>';
        $html['thsource'] .= '<th>Action</th>';


        foreach ($allStudent as $key => $v) {
            $registrationfee = FeeCategoryAmount::where('fee_category_id','1')->where('class_id',$v->class_id)->first();

            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['id_number'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';

            $originalfee = $registrationfee->amount;
            $discount = $v['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;

            $html[$key]['tdsource'] .='<td>'.$finalfee.'$'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("student.registration.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

        }
       return response()->json(@$html);

   }// end method






    public function StudentFeeStore(Request $request){

    	$date = date('Y-m',strtotime($request->date));

    	AccountStudentFee::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('fee_category_id',$request->fee_category_id)->where('date',$request->date)->delete();

    	$checkdata = $request->checkmanage;

    	if ($checkdata !=null) {
    		for ($i=0; $i <count($checkdata) ; $i++) {
    			$data = new AccountStudentFee();
    			$data->year_id = $request->year_id;
    			$data->class_id = $request->class_id;
    			$data->date = $date;
    			$data->fee_category_id = $request->fee_category_id;
    			$data->student_id = $request->student_id[$checkdata[$i]];
    			$data->amount = $request->amount[$checkdata[$i]];
    			$data->save();
    		} // end for loop
    	} // end if

    	if (!empty(@$data) || empty($checkdata)) {

    	$notification = array(
    		'message' => 'Well Done Data Successfully Updated',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.fee.view')->with($notification);
    	}else{

    		$notification = array(
    		'message' => 'Sorry Data not Saved',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);

    	}

    } // end method





}
