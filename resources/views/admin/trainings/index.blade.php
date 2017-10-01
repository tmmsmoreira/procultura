@extends('admin.layouts.main')

@section('required-css-files')
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Formação
        <small>Gestão de sessões de formação</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Páginas</li>
        <li class="active">Formação</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Your Page Content Here -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="agenda-list" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Localização</th>
                                <th>Criado em</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trainings as $training)
                            <tr>
                                <td>{{ $training->name }}</td>
                                <td>{{ $training->location }}</td>
                                <td>{{ $training->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.trainings.create') }}" class="btn btn-info" role="button">Adicionar</a>
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
        $('#agenda-list').DataTable({
            "language": {
                "url": "/plugins/datatables/_languages/pt-PT.json"
            }
        });
    });
</script>
@stop
