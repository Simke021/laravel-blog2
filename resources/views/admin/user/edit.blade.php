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
              <h3 class="box-title">Update Admin</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('includes.messages')
            <form role="form" action="{{ route('user.update', $user->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
              <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="name">User Name:</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="John Doe" required value="@if(old('name')){{ old('name') }}@else{{ $user->name }}@endif">
                    </div>

                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="example@mail.com ..." required value="@if(old('email')){{ old('email') }}@else{{ $user->email }}@endif">
                    </div>

                    <div class="form-group">
                      <label for="phone">Phone:</label>
                      <input type="" name="phone" class="form-control" id="phone" placeholder="060123456 " required  value="@if(old('phone')){{ old('phone') }}@else{{ $user->phone }}@endif">
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <div class="checkbox">
                          <label><input type="checkbox" name="status" 
                            @if(old('status') == 1 || $user->status == 1)
                              checked
                            @else{{ $user->phone }}
                            @endif" 
                            id="status" value="1"> Status</label>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="role">Assign Role:</label>
                      <div class="row">

                        @foreach($roles as $role)

                          <div class="col-lg-3">
                            <div class="checkbox" >
                              <label><input type="checkbox" name="role[]" value="{{ $role->id }}"
                              @foreach($user->roles as $user_role)
                                @if($user_role->id == $role->id)
                                  checked 
                                @endif
                              @endforeach> {{ $role->name }} </label>
                            </div>
                          </div>

                        @endforeach

                      </div>
                    </div>
                    <div class="form-group">
                       <button type="submit" class="btn btn-primary">Update User</button>
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