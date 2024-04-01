@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">


<div class="col-12">
<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Student <strong>Roll Generator</strong></h4>
				  </div>

				  <div class="box-body">
                    {{-- {{ route('roll.generate.store') }} --}}
		<form method="post" action="{{ route('roll.generate.store') }}">
			@csrf

                <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                            <h5>Year <span class="text-danger"> </span></h5>
                            <div class="controls">
                                    <select name="year_id" id="year_id" required="" class="form-control">
                                        <option value="" selected="" disabled="">Select Year</option>
                                        @foreach($years as $year)
                                        <option value="{{ $year->id }}" >{{ $year->name }}</option>
                                        @endforeach
                                    </select>
                             </div>
                            </div>
                        </div> <!-- End Col md 4 -->

                       <div class="col-md-3">
                            <div class="form-group">
                            <h5>Stream <span class="text-danger"> </span></h5>
                            <div class="controls">
                                    <select name="stream_id" id="stream_id" required="" class="form-control">
                                        <option value="" selected="" disabled="">Select Stream</option>
                                        @foreach($streams as $stream)
                                        <option value="{{ $stream->id }}" >{{ $stream->name }}</option>
                                        @endforeach
                                    </select>
                             </div>
                            </div>
                        </div> <!-- End Col md 4 -->





                        <div class="col-md-3">

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
                        </div> <!-- End Col md 4 -->


                                <div class="col-md-3" style="padding-top: 25px;">
                                    <a id="search" class="btn btn-primary" name="search"> Search</a>
                                </div> <!-- End Col md 4 -->
	            </div><!--  end row -->


 <!--  ////////////////// Roll generate table /////////////  -->


 <div class="row d-none" id="roll-generate">
 	<div class="col-md-12">
 		<table class="table table-bordered table-striped" style="width: 100%">
 			<thead>
 				<tr>
 					<th>ID No</th>
 					<th>Student Name </th>
 					<th>Father Name </th>
 					<th>Gender</th>
 					<th>Roll</th>
 				 </tr>
 			</thead>
 			<tbody id="roll-generate-tr">

 			</tbody>

 		</table>

 	</div>

 </div>

  <input type="submit" class="btn btn-info" value="Roll Generator">


		</form>


			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>
  </div>


<script type="text/javascript">
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var stream_id = $('#stream_id').val();
    var class_id = $('#class_id').val();

     $.ajax({
      url: "{{ route('student.registration.getstudents')}}",
      type: "GET",
      data: {'year_id':year_id,'stream_id':stream_id,'class_id':class_id,},
      success: function (data) {
        $('#roll-generate').removeClass('d-none');
        var html = '';
        $.each( data, function(key, v){
          html +=
          '<tr>'+
          '<td>'+v.student.id_number+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
          '<td>'+v.student.name+'</td>'+
          '<td>'+v.student.fatherame+'</td>'+
          '<td>'+v.student.gender+'</td>'+
          '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="'+v.roll+'"></td>'+
          '</tr>';
        });
        html = $('#roll-generate-tr').html(html);
      }
    });
  });

</script>



@endsection
