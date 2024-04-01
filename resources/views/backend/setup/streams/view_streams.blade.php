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
				  <h3 class="box-title">Stream List</h3>
				  {{-- {{ route('student.group.add') }} --}}
	<a href="{{ route('student.streams.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Stream</a>

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>
				<th>Name</th>
				<th width="25%">Action</th>

			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $group )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $group->name }}</td>
				<td>
					{{-- {{ route('student.group.edit',$group->id) }} --}}
					{{-- {{ route('student.group.delete',$group->id) }} --}}
<a href="{{ route('student.streams.edit',$group->id) }}" class="btn btn-info">Edit</a>
<a href="{{ route('student.streams.delete',$group->id) }} --}}" class="btn btn-danger" id="delete">Delete</a>

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
