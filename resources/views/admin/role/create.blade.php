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
              <h3 class="box-title">Roles</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('includes.messages')
            <form role="form" action="{{ route('role.store') }}" method="POST">
            {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="name">Role Title:</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Role title ..." required>

                    </div> 

                    <div class="row">
                      <div class="col-lg-4">
                        <label for="name">Post Permissions:</label>
                        @foreach($permissions as $permission)
                          @if($permission->for == 'post')
                            <div class="checkbox">
                              <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                          @endif
                        @endforeach
                      </div>

                      <div class="col-lg-4">
                        <label for="name">User Permissions:</label>
                        @foreach($permissions as $permission)
                          @if($permission->for == 'user')
                            <div class="checkbox">
                              <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                          @endif
                        @endforeach                      
                      </div>

                      <div class="col-lg-4">
                        <label for="name">Other Permissions:</label>
                        @foreach($permissions as $permission)
                          @if($permission->for == 'other')
                            <div class="checkbox">
                              <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                          @endif
                        @endforeach                      
                      </div>
                     
                    </div><!-- End of Row -->

                    <div class="form-group">
                       <button type="submit" class="btn btn-primary">Create Role</button>
                       <a href="{{ route('role.index') }}" class="btn btn-warning">Back</a>
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