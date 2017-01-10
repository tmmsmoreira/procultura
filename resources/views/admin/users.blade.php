@extends('admin.layouts.main')

@section('required-css-files')
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Utilizadores
        <small>Gestão de todos os utilizadores</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Estado do Site</li>
        <li class="active">Utilizadores</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Your Page Content Here -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="users-list" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Prefil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->key }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@stop

@section('required-js-scripts')
<!-- DataTables -->
<script src="/plugins/datatables/datatables.min.js"></script>
@stop

@section('page-script')
<!-- page script -->
<script>
    $(function () {
        $('#users-list').DataTable({
            "language": {
                "url": "/plugins/datatables/_languages/pt-PT.json"
            }
        });
    });
</script>
@stop
