@extends('admin.layouts.main')

@section('required-css-files')
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap.css">
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Adicionar Evento
        <small>Gestão da agenda cultural</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Páginas</li>
        <li class="active">Agenda Cultural</li>
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
                                <th>Título</th>
                                <th>Localização</th>
                                <th>Data e Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agenda as $event)
                            <tr>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->location }}</td>
                                <td>{{ $event->datetime }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <a href="agenda/create" class="btn btn-info" role="button">Adicionar Evento</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@stop

@section('required-js-scripts')
<!-- DataTables -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
@stop

@section('page-script')
<!-- page script -->
<script>
    $(function () {
        $('#agenda-list').DataTable({
            "language": {
                "url": "/plugins/datatables/languages/pt-PT.json"
            }
        });
    });
</script>
@stop
