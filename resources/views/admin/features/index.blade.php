@extends('admin.layouts.app')

@php
$pageTitle = 'Feature List'
@endphp

@push('styles')
@endpush
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Feature List
        <small>Manage car features</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li>Manage Car</li>
        <li class="active">Feature List</li>
    </ol>
</section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Feature List</h3>
               <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn bg-navy" title="" data-original-title="Create New" data-toggle="modal" data-target="#addModal">
                  <i class="fa fa-plus"></i> Create New</button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="list-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($features as $indx => $feature)
                <tr>
                    <td>{{ $indx + 1 }}</td>
                    <td>{{ $feature->name }}</td>
                    <td>{!! getStatusLabel($feature->status) !!}</td>
                    <td>
                        <button class="btn bg-navy" title="" data-original-title="Edit Feature" onclick="openEditModal('{{ route('admin.features.update', $feature->id) }}', '{{ $feature->name }}','{{ $feature->status }}')"><i class="fa fa-edit"></i> Edit</button>
                        <a href="{{ route('admin.features.destroy', $feature->id) }}" class="btn btn-danger" data-confirm-delete="true" title="" data-original-title="Delete Feature"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
              </table>
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
    <!-- Add Feature Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title fw-bold">Create Feature</h3>
          </div>
          <form action="{{ route('admin.features.store') }}" method="POST">
            @csrf
              <div class="modal-body">
                <div class="form-group">
                    <label for="featureName">Feature Name</label>
                    <input type="text" class="form-control" id="featureName" name="name" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title fw-bold">Edit Feature</h3>
          </div>
          <form id="editForm" method="POST" action="">
            @csrf
            @method('PUT')
              <div class="modal-body">
                <div class="form-group">
                    <label for="editName">Feature Name</label>
                    <input type="text" class="form-control" id="editName" name="name" required>
                </div>
                 <div class="form-group">
                    <label for="estatus">Visibility Status</label>
                    <select class="form-control" id="estatus" name="status" required>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@push('scripts')
    <script src="{{ asset('backend/js/pages/carbook.js') }}"></script>
@endpush
