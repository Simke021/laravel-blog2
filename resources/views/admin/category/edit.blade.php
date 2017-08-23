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
            @include('includes.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('category.update', $category->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
              <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="name">Category name:</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Post category name..." value="{{ $category->name }}">
                    </div>

                    <div class="form-group">
                      <label for="slug">Category slug:</label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="Category URL slug ..." value="{{ $category->slug }}">
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Create Category</button>
                      <a href="{{ route('category.index') }}" class="btn btn-warning">Back</a>
                    </div>
                  </div>
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