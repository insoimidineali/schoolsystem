<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Terms;

class SemesterController extends Controller
{
    // public function ViewStudent(){
    // 	$data['allData'] = Terms::all();
    // 	return view('backend.setup.student_terms.view_tems',$data);

    // }


    // public function StudentClassAdd(){
    // 	return view('backend.setup.student_terms.add_terms');
    // }


    // public function StudentClassStore(Request $request){
    // 	$validatedData = $request->validate([
    // 		'name' => 'required|unique:student_classes,name',
    // 	]);
    // 	$data = new Terms();
    // 	$data->name = $request->name;
    // 	$data->save();

    // 	$notification = array(
    // 		'message' => 'Class name Inserted Successfully',
    // 		'alert-type' => 'success'
    // 	);
    // 	return redirect()->route('student.terms.view')->with($notification);

    // }



    // public function StudentClassEdit($id){
    // 	$editData = Terms::find($id);
    // 	return view('backend.setup.student_terms.edit_terms',compact('editData'));

    // }


    // public function StudentClassUpdate(Request $request,$id){

	// 	$data = Terms::find($id);

    //  $validatedData = $request->validate([
    // 		'name' => 'required|unique:student_classes,name,'.$data->id

    // 	]);


    // 	$data->name = $request->name;
    // 	$data->save();

    // 	$notification = array(
    // 		'message' => 'Class name Updated Successfully',
    // 		'alert-type' => 'success'
    // 	);

    // 	return redirect()->route('student.terms.view')->with($notification);
    // }


    // public function StudentClassDelete($id){
    // 	$user = Terms::find($id);
    // 	$user->delete();

    // 	$notification = array(
    // 		'message' => ' Class name Deleted Successfully',
    // 		'alert-type' => 'info'
    // 	);

    // 	return redirect()->route('student.terms.view')->with($notification);

    // }



}
