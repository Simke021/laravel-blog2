@extends('admin.layouts.app')

@section('main-content')	
  
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Editors
        <small>Advanced form element</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Titles</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="name">Tag:</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Post tag ...">
                    </div>

                    <div class="form-group">
                      <label for="slug">Tag URL Slug:</label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="Post Tag URL Slug ...">
                    </div>

                    <div class="form-group">
	                <button type="submit" class="btn btn-primary">Submit</button>
	              </div>
                </div>

			  </div><!-- End of col-lg-6 --> 
            </form>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection