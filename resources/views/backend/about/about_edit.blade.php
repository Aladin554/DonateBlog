@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">






<!--   ------------ Edit About Page -------- -->


          <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit About </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('about.update') }}" enctype="multipart/form-data">
	 	@csrf
	 <input type="hidden" name="id" value="{{ $abouts->id }}">	
	 <input type="hidden" name="old_image" value="{{ $abouts->image }}">

	 <div class="form-group">
		<h5>About Title <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="title" class="form-control" value="{{ $abouts->title }}" >

	  </div>
	</div>

	 


	<div class="form-group">
		<h5>About Decription <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="description" class="form-control" value="{{ $abouts->description }}" >

	  </div>
	</div>



	<div class="form-group">
		<h5>About Image <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="file" name="image" class="form-control" >
     @error('image') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
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