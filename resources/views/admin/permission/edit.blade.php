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
              <h3 class="box-title">Edit Permission</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('includes.messages')
            <form role="form" action="{{ route('permission.update', $permission->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
              <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="name">Permission:</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Permision name ..." required value="{{ $permission->name }}">
                    </div>                   

                    <div class="form-group">
                       <button type="submit" class="btn btn-primary">Update Permission</button>
                       <a href="{{ route('permission.index') }}" class="btn btn-warning">Back</a>
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