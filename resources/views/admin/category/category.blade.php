@extends('admin.layouts.app')

@section('main-content')	
  
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @include('admin.layouts.pageHead')  
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Titles</h3>
            </div>
            @include('includes.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('category.store') }}" method="POST">
            {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="name">Category name:</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Post category name...">
                    </div>

                    <div class="form-group">
                      <label for="slug">Category slug:</label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="Category URL slug ...">
                    </div>

                    <div class="form-group">
    	                <button type="submit" class="btn btn-primary">Create Category</button>
                      <a href="{{ route('category.index') }}" class="btn btn-warning">Back</a>
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