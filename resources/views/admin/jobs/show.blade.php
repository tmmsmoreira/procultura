@extends('admin.layouts.main')
@include('commons.deletePopup')

@section('required-css-files')
<!-- daterange picker -->
<link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
<style>
    .form-control {
        height: auto !important;
    }
</style>
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ $job->title }}
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Páginas</li>
        <li><a href="{{ route('jobs.index') }}">Emprego</a></li>
        <li class="active">{{ $job->title }}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Your Page Content Here -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <label>Descrição</label>
                        <span class="form-control" id="descriptionTextarea">{{ $job->description }}</span>
                    </div>
                    <div class="form-group">
                        <label>Localização</label>
                        <span class="form-control" id="locationInput">{{ $job->location }}</span>
                    </div>
                    <div class="form-group">
                        <label>Imagem</label>
                        <div class="container-fluid">
                            <div class="row">
                                @if(file_exists(public_path() . '/storage/' . $job->image))
                                <img width="50%" src="{{ asset('storage/' . $job->image) }}" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning" id="edit_button">Editar</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#delete_modal" data-link="{{ route('jobs.destroy', $job->id) }}">Delete</button>
                    <a href="{{ route('jobs.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</section>

@yield('delete_popup')

<!-- /.content -->
@stop

@section('required-js-scripts')

@stop

@section('page-script')
<!-- page script -->
<script>
$('#delete_modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget),
        link = button.data('link')
        modal = $(this);

    modal.find('#delete_form').attr("action", link);
});
</script>
@stop
