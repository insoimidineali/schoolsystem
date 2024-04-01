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
				  <h3 class="box-title">Student Attendance Details </h3>

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
		<table  class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>
				<th>Name</th>
				<th>ID No </th>
				<th>Date </th>
				<th>Attend Status</th>


			</tr>
		</thead>
		<tbody>
			@foreach($details as $key => $value )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $value['user']['name'] }}</td>
				<td> {{ $value['user']['id_number'] }}</td>
				<td> {{ date('d-m-Y', strtotime($value->date)) }}</td>
				{{-- <td> {{ $value->attend_status }}</td> --}}

                <td>
                    @if($value->attend_status == 'Present')

                            <span class="badge badge-pill badge-success">
                                <i class="fa fa-check-square-o fa-lg" aria-hidden="true" ></i>
                            </span>


                    @elseif($value->attend_status == 'Absent')
                        <!-- Ajoutez l'icône pour l'absence -->
                        {{-- glyphicon glyphicon-ok-sign --}}
                        <span class="badge badge-pill badge-danger">
                            <i class="fa fa-close fa-lg" aria-hidden="true" ></i>
                        </span>
                    @elseif($value->attend_status == 'Sick')
                        <!-- Ajoutez l'icône pour l'absence  <i class="fas fa-house-leave"></i> class="fa fa-close"    class="fa fa-fw fa-arrow-right"-->
                        <span class="badge badge-pill badge-info">
                            <i class="fa fa-fw fa-arrow-right fa-lg" aria-hidden="true" ></i>
                        </span>
                    @else
                        <!-- Autre état ou traitement -->
                        {{ $value->attend_status }}
                    @endif
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
