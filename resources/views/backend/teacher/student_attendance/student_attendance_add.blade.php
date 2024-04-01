@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Attendance </h4>

			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="GET" action="{{ route('student.attendance.getstudents') }}">
	 	@csrf
        {{-- {{ route('store.employee.attendance') }} --}}
					  <div class="row">
						<div class="col-12">



   <div class="row">
   	<div class="col-md-4">

   		<div class="form-group">
		<h5>Attendance Date <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="date" name="date" class="form-control" >
	  </div>
	</div>

   	</div>  <!-- // End Col md 6 -->

        <div class="col-md-4">

                <div class="form-group">
                   <h5>Class <span class="text-danger"> </span></h5>
                   <div class="controls">
                        <select name="class_id" id="class_id"  required="" class="form-control">
                            <option value="" selected="" disabled="">Select Class</option>
                            @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>

            </div>
	<div class="box-header with-border">
	 <input type="submit"  id="search_students" class="btn btn-rounded btn-info mb-5" value="check">


            {{-- <button type="button" id="search_students" style="float: right;" class="btn btn-rounded btn-success mb-5">Rechercher les étudiants</button> --}}
    </div>
   </div> <!-- // end Row  -->


   <div class="row">
   	<div class="col-md-12">

   		<table class="table table-bordered table-striped" style="width: 100%">
   			<thead>
   				<tr>
   	<th rowspan="2" class="text-center" style="vertical-align: middle;">Sl</th>
   	<th rowspan="2" class="text-center" style="vertical-align: middle;">Student Name</th>
   	<th rowspan="2" class="text-center" style="vertical-align: middle;">Student ID</th>
   <th colspan="3" class="text-center" style="vertical-align: middle; width: 30%">Attendance Status</th>
   				</tr>

   	<tr>
   		<th class="text-center btn present_all" style="display: table-cell; background-color: #04ce36">Present</th>
   		<th class="text-center btn leave_all" style="display: table-cell; background-color: #0066ff">Sick</th>
   		<th class="text-center btn absent_all" style="display: table-cell; background-color: #fd0000">Absent</th>
   	</tr>
   			</thead>
   			<tbody>
   		@foreach($students as $key => $students)

   	<tr id="div{{$students->id}}" class="text-center">
   		<input type="hidden" name="student_id[]" value="{{ $students->id }}">
		 <td>{{ $key+1  }}</td>
		<td>{{ $students->name }}</td>
		<td>{{ $students->id_number }}</td>


		<td colspan="3">
			    <div class="switch-toggle switch-3 switch-candy">

                    <input name="attend_status{{$key}}" type="radio" value="Present" id="present{{$key}}" checked="checked" class="radio-col-success">
                    <label for="present{{$key}}">Present</label>

                    <input name="attend_status{{$key}}" value="Sick" type="radio" id="Sick{{$key}}"  >
                    <label for="Sick{{$key}}">Sick</label>

                    <input name="attend_status{{$key}}" value="Absent"  type="radio" id="absent{{$key}}" class="radio-col-danger">
                    <label for="absent{{$key}}">Absent</label>

	            </div>
		</td>
   	</tr>

   	@endforeach
   			</tbody>
   		</table>





   	</div>   <!-- // End Col md 12 -->
   </div> <!-- // end Row  -->



						<div class="text-xs-right">
	 <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>





	  </div>
  </div>





@endsection



