<?php


namespace App\Http\Controllers\Backend\Setup;
use App\Models\StudentStream;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentStreamController extends Controller
{
    public function ViewStreams(){
    	$data['allData'] = StudentStream::all();
    	return view('backend.setup.streams.view_streams',$data);

    }

	 public function StudentStreamsAdd(){
	    	return view('backend.setup.streams.add_streams');
	}


    public function StudentStreamsStore(Request $request){

	    	$validatedData = $request->validate([
	    		'name' => 'required|unique:student_streams,name',

	    	]);

	    	$data = new StudentStream();
	    	$data->name = $request->name;
            $data->description = $request->description;
	    	$data->save();

	    	$notification = array(
	    		'message' => 'Stream Inserted Successfully',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('student.streams.view')->with($notification);

	}


	public function StudentStreamsEdit($id){
		 $editData = StudentStream::find($id);
		  return view('backend.setup.streams.edit_streams',compact('editData'));

    }



    public function StudentStreamsUpdate(Request $request,$id){

		$data = StudentStream::find($id);

     $validatedData = $request->validate([
    		'name' => 'required|unique:student_streams,name,'.$data->id

    	]);


    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Student Stream Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.streams.view')->with($notification);
    }


    public function StudentStreamsDelete($id){
	    	$user = StudentStream::find($id);
	    	$user->delete();

	    	$notification = array(
	    		'message' => '1 Stream Deleted Successfully',
	    		'alert-type' => 'info'
	    	);

	    	return redirect()->route('student.streams.view')->with($notification);

    }

// setups/student/department/view

}
