@extends('admin.layouts.app')

@section('headSection')
  <link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.css') }}">
@endsection

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
            <form role="form" action="{{ route('post.store') }}" method="POST">
            {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="title">Post Title:</label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Post title ..." required">
                    </div>
                    <div class="form-group">
                      <label for="subtitle">Post Subtitle:</label>
                      <input type="text" name="subtitle" class="form-control" id="subtitle" placeholder="Post Subtitle ...">
                    </div>
                    <div class="form-group">
                      <label for="slug">URL Post Slug:</label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="URL Slug ...">
                    </div>
                  </div>
                </div><!-- End of col-lg-6 -->                              
                  <div class="col-lg-6">
                    <div class="box-body">
                      <div class="form-group">
                        <label>Select Tags:</label>
                        <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Tag" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                          @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Select Category:</label>
                        <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Category" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        </select>
                      </div>
                      <br>
                      <div class="form-group">
                        <div class="pull-right">
                          <label for="image">File input:</label>
                          <input type="file" id="image" name="image">
                        </div>
                        <div class="checkbox pull-left">
                        <label>
                          <input type="checkbox" name="status" value="1"> Publish
                        </label>
                        </div>
                      </div><!-- End form-group -->
                      <br>                     
                    </div> <!-- End box-body --> 
                  </div><!-- End of col-lg-6 -->
               </div><!-- End of row-->                                          
              <!-- /.box-body -->
              <!-- /.box -->
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Write Post here:
                    <small>Simple and fast</small>
                  </h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                  </div>
                  <!-- /. tools -->
                </div>
                <!-- /.box-header -->

                <div class="box-body pad">
                  <textarea name="body" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1"></textarea>
                </div>

              </div><!-- End of box -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Create Post</button>
                  <a href="{{ route('post.index') }}" class="btn btn-warning">Back</a>
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

@section('footerSection')
 <!-- Za unos -->
<script src="{{ asset('admin/plugins/select2/select2.full.min.js')}}"></script>
<!-- CK Editor CND -->
<script src="//cdn.ckeditor.com/4.7.2/full/ckeditor.js"></script>
<!-- CK editor script -->
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
  <script>
    $(document).ready(function(){
      //Initialize Select2 Elements
      $(".select2").select2();
      });
  </script>
@endsection