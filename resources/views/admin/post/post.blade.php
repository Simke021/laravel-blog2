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
                <div class="col-lg-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="title">Post Title:</label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Post title ...">
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
                        <label for="image">File input:</label>
                        <input type="file" id="image" name="image">
                      </div>
                      <br>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="status"> Publish
                        </label>
                      </div>
                    </div>  
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
                  <form>
                    <textarea class="textarea" placeholder="Place Text for Post Bpdy Here..." name="body" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </form>
                </div>

              </div><!-- End of box -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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