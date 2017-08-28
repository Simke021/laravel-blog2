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
              <h3 class="box-title">Edit Role</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('includes.messages')
            <form role="form" action="{{ route('role.update', $role->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
              <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="name">Role Name:</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Role title ..." required value="{{ $role->name }}">
                    </div>

                    <div class="row">
                      <div class="col-lg-4">
                        <label for="name">Post Permissions:</label>
                        @foreach($permissions as $permission)
                          @if($permission->for == 'post')
                            <div class="checkbox">
                              <label><input type="checkbox" name="permission[]" 
                              value="{{ $permission->id }}"
                              @foreach($role->permissions as $role_permit)
                                @if ($role_permit->id == $permission->id)
                                  checked
                                @endif
                              <@endforeach       
                              >{{ $permission->name }}</label>
                            </div>
                          @endif
                        @endforeach
                      </div>

                      <div class="col-lg-4">
                        <label for="name">User Permissions:</label>
                        @foreach($permissions as $permission)
                          @if($permission->for == 'user')
                            <div class="checkbox">
                              <label><input type="checkbox" name ="permission[]" 
                              value="{{ $permission->id }}"
                              @foreach($role->permissions as $role_permit)
                                @if ($role_permit->id == $permission->id)
                                  checked
                                @endif
                              <@endforeach        
                              >{{ $permission->name }}</label>                    
                            </div>
                          @endif
                        @endforeach                      
                      </div>

                      <div class="col-lg-4">
                        <label for="name">Other Permissions:</label>
                        @foreach($permissions as $permission)
                          @if($permission->for == 'other')
                            <div class="checkbox">
                              <label><input type="checkbox" name="permission[]" 
                              value="{{ $permission->id }}"
                              @foreach($role->permissions as $role_permit)
                                @if ($role_permit->id == $permission->id)
                                  checked
                                @endif
                              <@endforeach         
                              >{{ $permission->name }}</label> 
                            </div>
                          @endif
                        @endforeach                      
                      </div>
                     
                    </div><!-- End of Row -->             

                    <div class="form-group">
                       <button type="submit" class="btn btn-primary">Edit Role</button>
                       <a href="{{ route('role.index') }}" class="btn btn-warning">Back</a>
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