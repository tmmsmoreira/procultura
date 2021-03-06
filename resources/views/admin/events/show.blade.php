@extends('admin.layouts.main')
@include('commons.deletePopup')

@section('required-css-files')
<!-- daterange picker -->
<link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
<style >
    .form-control {
        height: auto !important;
    }
</style>
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Evento: {{ $event->id }}
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Páginas</li>
        <li><a href="{{ route('admin.events.index') }}">Agenda Cultural</a></li>
        <li class="active">Evento {{ $event->id }}</li>
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
                        <label>Titulo</label>
                        <span class="form-control" id="titleTextarea">{{ $event->title }}</span>
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <span class="form-control" id="descriptionTextarea">{{ $event->description }}</span>
                    </div>
                    <div class="form-group">
                        <label>Localização</label>
                        <span class="form-control" id="locationInput">{{ $event->location }}</span>
                    </div>
                    <div class="form-group">
                        <label>Data de inicio e de fim:</label>
                        <span class="form-control" id="datetime">{{ $event->start_datetime->format('d-m-Y H:i') . " / " . $event->end_datetime->format('d-m-Y H:i') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Imagem</label>
                        <div class="container-fluid">
                            <div class="row">
                                @if(file_exists(public_path() . '/storage/' . $event->image))
                                <img width="50%" src="{{ asset('storage/' . $event->image) }}" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-warning" id="edit_button">Editar</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#delete_modal" data-link="{{ route('admin.events.destroy', $event->id) }}">Delete</button>
                    <a href="{{ route('admin.events.index') }}" class="btn btn-default">Cancelar</a>
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
