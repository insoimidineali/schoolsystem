@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">


<div class="col-12">
<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Student <strong>Marsk Entry</strong></h4>
				  </div>

				  <div class="box-body">
{{-- {{ route('marks.entry.store') }} --}}
		<form method="post" action="{{ route('marks.entry.store') }}">
			@csrf
			<div class="row">



 <!-- End Col md 3 -->



 <!-- End Col md 3 -->


 <div class="col-md-4">

    <div class="form-group">
  <h5>Student Name <span class="text-danger">*</span></h5>
  <div class="controls">
<input type="text" name="id_number" id="id_number" class="form-control" required="" >
</div>
</div>

       </div> <!-- End Col md 3 -->


 <!-- End Col md 3 -->





                                <div class="col-md-3" style="padding-top: 25px;"  >

                    <a id="search" class="btn btn-primary" style="padding-: 5%" name="search"> Search</a>

                                </div> <!-- End Col md 3 -->
			</div><!--  end row -->


 <!--  ////////////////// Mark Entry table /////////////  -->


 <div class="row d-none" id="marks-entry">
 	<div class="col-md-12">
 		<table class="table table-bordered table-striped" style="width: 100%">
 			<thead>
 				<tr>
 					<th>ID No</th>
 					<th>Student Name </th>
 					<th>Father Name </th>
 					<th>Gender</th>
 					<th>Marks</th>
 				 </tr>
 			</thead>
 			<tbody id="marks-entry-tr">

 			</tbody>

 		</table>
 <input type="submit" class="btn btn-rounded btn-primary" value="Submit">
 {{-- <button type="button" id="search" name="search">Search</button> --}}
 	</div>

 </div>


		</form>


			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
        {{-- {{ route('student.marks.getstudents')}} --}}

	  </div>
  </div>


<script type="text/javascript">
  $(document).on('click','#search',function(){

    var id_number = $('#id_number').val();

     $.ajax({
      url: "{{ route('view student.marks.getresult')}}",
      type: "GET",
      data: {'id_number':id_number},

      success: function (data) {
        if (data.length > 0) {
            console.log(data);

            } else {
                console.log("L'étudiant n'existe pas");
            }
        $('#marks-entry').removeClass('d-none');
        var html = '';
        $.each( data, function(key, v){
          html +=
          '<tr>'+
        //   '<td>'+v.student.id_number+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"> <input type="hidden" name="id_number[]" value="'+v.student.id_number+'"> </td>'+
          '<td>'+v.student.name+'</td>'+
          '<td>'+v.student.fathername+'</td>'+
          '<td>'+v.student.gender+'</td>'+
        //   '<td><input type="text" class="form-control form-control-sm" name="marks[]" ></td>'+
          '</tr>';
        });
        html = $('#marks-entry-tr').html(html);
      }
    });
  });

</script>




@endsection
