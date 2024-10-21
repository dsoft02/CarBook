@extends('user.layouts.app')

@push('styles')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
@endpush
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Contact Messages
        <small>Create Message</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="active">Create Message</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Create New Message</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <a href="{{ route('user.contacts') }}" class="btn bg-navy" title="" data-original-title="Back">
                            <i class="fa fa-undo"> </i> Back</a>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <form method="POST" action="{{ route('user.contacts.store') }}"> <!-- Added form tag -->
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <input class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="Name:"
                                   readonly>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}"
                                   placeholder="Email:" readonly>
                        </div>
                        <div class="form-group @error('subject') has-error @enderror">
                            <input class="form-control" name="subject" placeholder="Subject:" required>
                            @error('subject')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('message') has-error @enderror">
                            <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px"
                                      required></textarea>
                            @error('message')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                        </div>
                        <a href="{{ route('user.contacts') }}" class="btn btn-default"><i class="fa fa-times"></i>
                            Discard</a>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection

@push('scripts')
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script>
    $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();

        $('#list-table').DataTable();
    });
</script>
@endpush
