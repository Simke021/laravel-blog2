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
              <h3 class="box-title">Add Admin</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('includes.messages')
            <form role="form" action="{{ route('user.store') }}" method="POST">
            {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="name">User Name:</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="John Doe" required>
                    </div>

                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="example@mail.com ..." required>
                    </div>

                    <div class="form-group">
                      <label for="password">Password:</label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Password Here ..." required>
                    </div>

                    <div class="form-group">
                      <label for="confirm_password">Confirm Password:</label>
                      <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password ..." required>
                    </div>

                    <div class="form-group">
                      <label for="role">Assign Role:</label>
                      <div class="row">

                        @foreach($roles as $role)

                          <div class="col-lg-3">
                            <div class="checkbox" >
                              <label><input type="checkbox" name="role[]" value="{{ $role->id }}">{{ $role->name }}</label>
                            </div>
                          </div>

                        @endforeach

                      </div>
                    </div>
                    <div class="form-group">
                       <button type="submit" class="btn btn-primary">Create User</button>
                       <a href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
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