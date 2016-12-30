@extends('admin.layouts.main')

@section('required-css-files')
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables/dataTables.min.css">
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Empregos
        <small>Gestão de vagas de emprego</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Páginas</li>
        <li class="active">Empregos</li>
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
                                <th>Nome</th>
                                <th>Localização</th>
                                <th>Criado em</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employments as $employment)
                            <tr>
                                <td>{{ $employment->name }}</td>
                                <td>{{ $employment->localy }}</td>
                                <td>{{ $employment->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <a href="agenda/create" class="btn btn-info" role="button">Adicionar</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@stop

@section('required-js-scripts')
<!-- DataTables -->
<script src="/plugins/datatables/dataTables.min.js"></script>
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
