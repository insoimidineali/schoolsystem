@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">



			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Teacher List</h3>
                  {{-- {{ route('employee.registration.add') }} --}}
                  @if(Auth::user()->role == 'Admin')
	<a href="{{ route('teacher.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Teacher</a>
                   @endif
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>
				<th>Name</th>
				<th>ID</th>
                <th>Email</th>
                <th>Stream</th>
				<th>Mobile</th>
				<th>Join Date</th>
				<th>Salary</th>
                <th>Images</th>
				@if(Auth::user()->role == "Admin")
				<th>Code</th>
				 @endif
				<th width="25%">Action</th>

			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $value )

			<tr>
				<td>{{ $key+1 }}</td>
                <td> {{ $value['teacher']->name }}</td>
				<td> {{ $value['teacher']->id_number }}</td>
                <td> {{ $value['teacher']->email }}</td>
                <td>{{ $value['teacherSallaryLog']->stream->name }}</td>
                <td> {{ $value['teacher']->mobile }}</td>
                <td> {{ $value['teacher']->join_date }}</td>
                <td> {{ $value['teacher']->salary }}</td>
                {{-- <td> {{ $teacher->salary }}</td> --}}
                 <td>
                  <img  src="{{ (!empty($value['teacher']['images']))? url('upload/teachers_images/'.$value['teacher']['images']):url('upload/no_image.jpg') }}" style="width: 60px; width: 60px;">
                  {{-- <img  src="{{ (!empty($value['student']['images']))? url('upload/teachers_images/'.$value['teacher']['images']):url('upload/no_image.jpg') }}" style="width: 60px; width: 60px;"> --}}
                </td>
                @if(Auth::user()->role == "Admin")
				{{-- <td> {{ $teacher->code }}</td> --}}
                <td> {{ $value['teacher']->code }}</td>
				 @endif
				<td>
                             {{-- {{ route('employee.registration.edit',$employee->id) }} --}}
                        <a href="{{ route('teacher.registration.edit',intval($value['teacher']->id)) }}" class="btn btn-info">Edit</a>
                        <a target="_blank" href="{{ route('teacher.registration.details',intval($value['teacher']->id)) }}" class="btn btn-danger">Details</a>
                        {{-- {{ route('employee.registration.details',$employee->id) }} --}}

				</td>



			</tr>
			@endforeach

						</tbody>
						<tfoot>

						</tfoot>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->


			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>
  </div>





@endsection
