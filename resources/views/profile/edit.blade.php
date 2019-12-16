@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'User Profile',
    'activePage' => 'profile',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-4">
        <div id="div_submit" class="card" style="display: block;">
          <div class="card-header">
            <h5 class="title">{{__(" User Profile")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('profile.create') }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @include('alerts.success')
              @if(session()->has('message'))
                  <div class="alert alert-success">
                      {{ session()->get('message') }}
                  </div>
              @endif
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>{{__(" Name")}}</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="" required>
                    @include('alerts.feedback', ['field' => 'name'])
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{__(" Email address")}}</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="" required>
                    @include('alerts.feedback', ['field' => 'email'])
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>{{__(" Is Admin?")}}</label>
                    <select name="isAdmin" id="isAdmin" class="form-control col-md-12" required>
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                    </select>
                    @include('alerts.feedback', ['field' => 'isAdmin'])
                  </div>
                </div>
              </div>  
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label>{{__(" New password")}}</label>
                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" type="password" name="password" required>
                    @include('alerts.feedback', ['field' => 'password'])
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label>{{__(" Confirm New Password")}}</label>
                    <input class="form-control" placeholder="{{ __('Confirm New Password') }}" type="password" name="password_confirmation" required>
                  </div>
                </div>
              </div>
              <div class="card-footer" align="center">
                <button type="submit" class="btn btn-primary btn-round ">{{__('Submit')}}</button>
              </div>
            </form>
          </div>
        </div>

        <div id="div_update" class="card" style="display: none;">
          <div class="card-header">
            <h5 class="title">{{__(" Edit Profile")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('profile.update') }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              {{-- @method('put') --}}
              @include('alerts.success')
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>{{__(" Name")}}</label>
                    <input type="text" id="edit_name" name="name" class="form-control" placeholder="Name" value="">
                    @include('alerts.feedback', ['field' => 'name'])
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{__(" Email address")}}</label>
                    <input type="email" id="edit_email" name="email" class="form-control" placeholder="Email" value="">
                    @include('alerts.feedback', ['field' => 'email'])
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>{{__(" Is Admin?")}}</label>
                    <select name="isAdmin" id="edit_isAdmin" class="form-control col-md-12">
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                    </select>
                    @include('alerts.feedback', ['field' => 'isAdmin'])
                  </div>
                </div>
              </div>  
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label>{{__(" New password")}}</label>
                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" type="password" name="password">
                    @include('alerts.feedback', ['field' => 'password'])
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label>{{__(" Confirm New Password")}}</label>
                    <input class="form-control" placeholder="{{ __('Confirm New Password') }}" type="password" name="password_confirmation">
                  </div>
                </div>
              </div>
              <div class="card-footer" align="center">
                <button type="submit" class="btn btn-warning btn-round ">{{__('Update')}}</button>
              </div>
            </form>
          </div>
        </div>

      </div>
      <div class="col-md-8">
        <div class="card card-user">
          <div class="image">
            <img src="{{asset('assets')}}/img/bg5.jpg" alt="...">
          </div>
          <div class="card-body">
            <div class="author">
              <a href="#">
                <i class="fa fa-users avatar border-gray" style="font-size: 100px; line-height: 120px"></i>
                <h5 class="title" style="line-height: 0px;">{{ __("User's Table") }}</h5>
              </a>
            </div>
            <table id="userTable" class="table table-striped table-dark table-sm table-responsive-md" width="100%" style="border-radius: 5px 5px 5px 5px;">
              <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th style="text-align-last: center;">Action</th>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr data_id="{{ $user->id }}">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin == 1 ? 'Admin' : 'User' }}</td>
                    <td style="font-size: 12px; text-align-last: center; width: 130px;">
                        <button type="button" style="float:right;" data-id="{{ $user->id }}" 
                          class="btnDelete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        <button type="button" style="float:right; margin-right: 3px;" 
                          data-id = "{{ $user->id }}" 
                          data-name = "{{ $user->name }}" 
                          data-email = "{{ $user->email }}" 
                          data-role = "{{ $user->is_admin == null ? '0' : '1' }}" 
                          class="btnEdit btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <hr>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
      $(document).ready(function() {
        $('#userTable').on('click', '.btnEdit', function(){
          var conf = confirm("Please confirm edit.");
          if(conf === true){
            $('#div_submit').hide();
            $('#div_update').show();

            var row_id = $(this).data('id');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var isAdmin = $(this).data('role');
            
            $('#edit_id').val(row_id);
            $('#edit_name').val(name);
            $('#edit_email').val(email);
            $('#edit_email').prop('readonly', true);
            $('#edit_isAdmin').val(isAdmin);
          }
        });
      });
    </script>
    
  </div>

@endsection