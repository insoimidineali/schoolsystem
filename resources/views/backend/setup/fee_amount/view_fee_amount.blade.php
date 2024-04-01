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
				  <h3 class="box-title">Fees Amount List</h3>
	{{-- {{ route('fee.amount.add') }} --}}
				  <a href="{{ route('fee.amount.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Fee Amount</a>

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>
				<th>Fee Amount</th>
				<th width="25%">Action</th>

			</tr>
		</thead>
		<tbody>
                    @foreach($allData as $key => $amount )
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td> {{ $amount['fee_category']['name'] }}</td>

                            {{-- <td> {{ $amount['fee_cateogry']['name'] }}</td>				  --}}
                            <td>
                                @if(isset($amount['fee_category']) && isset($amount['fee_category']['name']))
                                {{-- {{ route('fee.amount.edit',$amount->fee_category_id) }} --}}
                                {{-- {{ route('fee.amount.details',$amount->fee_category_id) }} --}}
                                <a href="{{ route('fee.amount.edit',$amount->fee_category_id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('fee.amount.details',$amount->fee_category_id) }}" class="btn btn-primary"><span class="mdi mdi-arrow-right"  data-toggle="tooltip" title="" data-original-title="Details"></span></a>
                                @else
                                N/A
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
