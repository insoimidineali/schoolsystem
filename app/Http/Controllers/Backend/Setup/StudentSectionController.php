<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentSectionController extends Controller
{
    public function ViewShift(){
    	$data['allData'] = StudentShift::all();
    	return view('backend.setup.section.view_section',$data);

    }
  // and function
	 public function StudentShiftAdd(){
		    	return view('backend.setup.section.add_section');
    }
 // and function

    public function StudentShiftStore(Request $request){

    	$validatedData = $request->validate([
    		'name' => 'required|unique:student_shifts,name',
    		
    	]);

    	$data = new StudentShift();
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Section Inserted Successfully',
    		'alert-type' => 'success'
    	);
    	return redirect()->route('student.section.view')->with($notification);
    }
 // and function


	public function StudentSectionEdit($id){
		 $editData = StudentShift::find($id);
		  return view('backend.setup.section.edit_section',compact('editData'));
	}
 // and function
    public function StudentSectionUpdate(Request $request,$id){

		$data = StudentShift::find($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:student_shifts,name,'.$data->id   		
    	]);	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Section Updated Successfully',
    		'alert-type' => 'success'
    	);
    	return redirect()->route('student.section.view')->with($notification);
    }

 // and function
    public function StudentSectionDelete($id){
	    	$user = StudentShift::find($id);
	    	$user->delete();
	    	$notification = array(
	    		'message' => 'Section Deleted Successfully',
	    		'alert-type' => 'info'
	    	);
	    	return redirect()->route('student.section.view')->with($notification);
	}

 // and function


}
