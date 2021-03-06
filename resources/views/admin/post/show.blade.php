@extends('admin.layouts.app')
@section('headSection')
	<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('main-content')
		  <!-- Content Wrapper. Contains page content -->
		  <div class="content-wrapper">
		    <!-- Content Header (Page header) -->
		    <section class="content-header">
		      @include('admin.layouts.pageHead')	
		    </section>
		    <!-- Main content -->
		    <section class="content">
		      <!-- Default box -->
		      <div class="box">
		      	<div class="box-header">
		      		@include('includes.messages')
		      	</div>
		        <div class="box-header with-border">
		          <h3 class="box-title">Title</h3>
				  <a href="{{ route('post.create') }}" class="col-lg-offset-5 btn btn-success">Add New Post</a>
		          <div class="box-tools pull-right">
		            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
		              <i class="fa fa-minus"></i></button>
		            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
		              <i class="fa fa-times"></i></button>
		          </div>
		        </div>
		        <div class="box-body">
		          <div class="box-body">
			              <table id="example1" class="table table-bordered table-striped">
			                <thead>
			                <tr>
			                  <th>S.No</th>
			                  <th>Title</th>
			                  <th>Subtitle</th>
			                  <th>Slug</th>
			                  <th>Created At</th>
			                  <th>Edit</th>
			                  <th>Delete</th>
			                </tr>
			                </thead>
			                <tbody>
			            @foreach($posts as $post)
			                <tr>
			                  <td>{{ $post->id }}</td>
			                  <td>{{ $post->title }}</td>
			                  <td>{{ $post->subtitle }}</td>
			                  <td>{{ $post->slug }}</td>
			                  <td>{{ $post->created_at }}</td>
			                  <td><a href="{{ route('post.edit', $post->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
			                  <td>
			                  	<form id="delete-form-{{ $post->id }}" action="{{ route('post.destroy', $post->id) }}" method="POST" style="display:none;" >
			                  		{{ csrf_field() }}
			                  		{{ method_field('DELETE') }}
			                  	</form>
			                  	<a href="" 
			                  		onclick="
			                  			if(confirm('Do you Realy want to delete this post?')) {
			                  				event.preventDefault(); document.getElementById('delete-form-{{ $post->id }}').submit(); 
			                  			}else{
											event.preventDefault();
			                  			}" ><span class="glyphicon glyphicon-trash"></span>
			                  	</a>
			                  </td>
			                </tr>
			            @endforeach
			                </tbody>
			                <tfoot>
			                <tr>
			                  <th>S.No</th>
			                  <th>Title</th>
			                  <th>Subtitle</th>
			                  <th>Slug</th>
			                  <th>Created At</th>
			                  <th>Edit</th>
			                  <th>Delete</th>
			                </tr>
			                </tfoot>
			              </table>
			            </div>
			            <!-- /.box-body -->
		        </div>
		        <!-- /.box-body -->
		        <div class="box-footer">
		          Footer
		        </div>
		        <!-- /.box-footer-->
		      </div>
		      <!-- /.box -->
		    </section>
		    <!-- /.content -->
		  </div>
		  <!-- /.content-wrapper -->
@endsection
@section('footerSection')
	<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
	<script>
	  $(function () {
	    $("#example1").DataTable();
	  });
	</script>
@endsection