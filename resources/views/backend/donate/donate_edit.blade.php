@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">

<!--   ------------ Edit Donate Page -------- -->


          <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Donate </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('donate.update') }}" enctype="multipart/form-data">
	 	@csrf
	 <input type="hidden" name="id" value="{{ $donates->id }}">	
	 		   

	 <div class="form-group">
		<h5>Donate Title <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="title" class="form-control" value="{{ $donates->title }}" > 

	</div>
	</div>


	<div class="form-group">
		<h5>Donate Description <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="description" class="form-control" value="{{ $donates->description }}" >

	  </div>
	</div>



	


			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">					 
						</div>
					</form>





					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>




		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>




@endsection