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
				  <h3 class="box-title">Student List</h3>
                  {{-- {{ route('employee.registration.add') }} --}}
                  @if(Auth::user()->role == 'Admin' || Auth::user()->role =="Teacher")
	<a href="{{ route('student.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Student</a>
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
                <th>Roll</th>
                <th>year</th>
				<th>Stream</th>
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
                <td> {{$value["student"]->name }}</td>
				<td> {{ $value["student"]->id_number }}</td>
				<td> {{ $value["student"]->email }}</td>
                    {{-- <td>{{ dd($value->student->email)}}</td> --}}
                <td> {{ $value["stream"]->roll }}</td>

                <td> {{ $value["year"]->name }}</td>
                <td> {{ $value["stream"]->name }}</td>


                {{-- <td> {{ $value['teacher']->mobile }}</td> --}}

                {{-- <td> {{ $teacher->salary }}</td> --}}
                 <td>
                  <img  src="{{ (!empty($value["student"]->images))? url('upload/student_images/'. $value["student"]->images):url('upload/no_image.jpg') }}" style="width: 60px; width: 60px;">

                </td>
                @if(Auth::user()->role == "Admin")

                <td> {{ $value["student"]->code }}</td>
				 @endif
				<td>

                            {{-- {{ route('employee.registration.edit',$employee->id) }} --}}
                            {{-- {{ route('student.details', $value->student?->id) }} --}}
                            @if(Auth::user()->role == "Admin")
                        <a href="{{ route('student.registration.edit',$value["student"]->id) }}" class="btn btn-info">Edit</a>
                        @endif
                        <a target="_blank" href="{{ route('student.registration.details', $value["student"]->id) }}" class="btn btn-danger">Details</a>
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
