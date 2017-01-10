@extends('admin.layouts.main')
@include('commons.deletePopup')

@section('required-css-files')
<!-- daterange picker -->
<link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ $event->title }}
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Páginas</li>
        <li><a href="{{ route('events.index') }}">Agenda Cultural</a></li>
        <li class="active">{{ $event->title }}</li>
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
                        <label for="descriptionTextarea">Descrição</label>
                        <span class="form-control" id="descriptionTextarea">{{ $event->description }}</span>
                    </div>
                    <div class="form-group">
                        <label for="locationInput">Localização</label>
                        <span class="form-control" id="locationInput">{{ $event->location }}</span>
                    </div>
                    <div class="form-group">
                        <label for="datetime">Data de inicio e de fim:</label>
                        <span class="form-control" id="datetime">{{ $event->start_datetime->format('d-m-Y H:i') . " / " . $event->end_datetime->format('d-m-Y H:i') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="imageUpload">Imagem</label>
                        <div class="container-fluid">
                            <div class="row">
                                <img width="50%" src="{{ asset('storage/' . $event->image) }}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning" id="edit_button">Editar</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#delete_modal" data-link="{{ route('events.destroy', $event->id) }}">Delete</button>
                    <a href="{{ route('events.index') }}" class="btn btn-default">Cancelar</a>
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
