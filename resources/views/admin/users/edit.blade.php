@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manage Users
        <small>Edit User</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.users.index') }}">Manage Users</a></li>
        <li class="active">Edit User</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Edit User</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <a href="{{ route('admin.users.index') }}" class="btn bg-navy" title=""
                           data-original-title="Back">
                            <i class="fa fa-undo"> </i> Back</a>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-9">
                            <form id="userForm" method="POST" action="{{ route('admin.users.update', $user->id) }}"
                                  enctype="multipart/form-data">
                                @csrf <!-- Include CSRF token for security -->
                                @method('PUT') <!-- Use PUT method for updates -->
                                <div class="row">
                                    <!-- Left Column -->
                                    <div class="col-md-6">
                                        <div class="form-group @error('name') has-error @enderror">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                   placeholder="Full Name" value="{{ old('name', $user->name) }}"
                                                   required>
                                            @error('name')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group @error('email') has-error @enderror">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                   placeholder="email@sample.com"
                                                   value="{{ old('email', $user->email) }}" required>
                                            @error('email')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group @error('phone') has-error @enderror">
                                            <label for="phone">Phone</label>
                                            <input type="text" id="phone" name="phone" class="form-control"
                                                   placeholder="Phone" value="{{ old('phone', $user->phone) }}">
                                            @error('phone')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group @error('role') has-error @enderror">
                                            <label for="role">User Role</label>
                                            <select id="role" name="role" class="form-control">
                                                <option value="customer" {{ (old(
                                                'role', $user->role) == 'customer') ? 'selected' : '' }}>Customer</option>
                                                <option value="staff" {{ (old(
                                                'role', $user->role) == 'staff') ? 'selected' : '' }}>Staff</option>
                                                <option value="admin" {{ (old(
                                                'role', $user->role) == 'admin') ? 'selected' : '' }}>Admin</option>
                                            </select>
                                            @error('role')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Right Column -->
                                    <div class="col-md-6">
                                        <div class="form-group @error('password') has-error @enderror">
                                            <label for="password">Password</label>
                                            <input type="password" id="password" name="password" class="form-control"
                                                   placeholder="Leave blank to keep current password">
                                            @error('password')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group @error('password_confirmation') has-error @enderror">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" id="password_confirmation"
                                                   name="password_confirmation" class="form-control"
                                                   placeholder="Confirm Password">
                                            @error('password_confirmation')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group @error('profile_picture') has-error @enderror">
                                            <label for="profile_picture">Profile Picture</label>
                                            <input type="file" class="form-control" id="profile_picture"
                                                   name="profile_picture">
                                            <small>The file size should not be more than 5MB</small>
                                            @error('profile_picture')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group @error('status') has-error @enderror">
                                            <label for="status">Status</label>
                                            <select id="status" name="status" class="form-control">
                                                <option value="1" {{ (old(
                                                'status', $user->status) == 1) ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ (old(
                                                'status', $user->status) == 0) ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('status')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                     <div class="form-group @error('address') has-error @enderror">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" id="address" name="address"
                                                      placeholder="Address">{{ old('address', $user->address) }}</textarea>
                                            @error('address')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update User</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection
