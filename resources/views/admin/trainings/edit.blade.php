@extends('admin.layouts.main')

@section('required-css-files')
<!-- daterange picker -->
<link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Editar Formação
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Páginas</li>
        <li><a href="{{ route('admin.trainings.index') }}">Formação</a></li>
        <li class="active">Editar Formação</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Your Page Content Here -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form role="form" method="POST" enctype="multipart/form-data"
                        action="{{ route('admin.trainings.update', ['id' => $training->id]) }}">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <div class="box-body">
                        <div class="form-group">
                            <label for="titleInput">Título</label>
                            <input type="text" class="form-control" id="titleInput" name="title"
                                placeholder="Introduza o título" value="{{ $training->title }}"/>
                        </div>
                        <div class="form-group">
                            <label for="descriptionTextarea">Descrição</label>
                            <textarea class="form-control" rows=20 id="descriptionTextarea" name="description"
                                placeholder="Introduza uma descrição" />{{ $training->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="locationInput">Localização</label>
                            <input type="text" class="form-control" id="locationInput" name="location"
                                placeholder="Introduza a localização" value="{{ $training->location }}"/>
                        </div>
                        <div class="form-group">
                            <label>Data de inicio e de fim:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datetime" name="datetime"
                                    value="{{ $training->start_datetime->format('d-m-Y H:i') . " / " . $training->end_datetime->format('d-m-Y H:i') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="imageUpload">Imagem</label>
                            <input type="file" id="imageUpload" name="image" />
                            <p class="help-block">A dimensão mínima da imagem é de 1280x720 e não pode ultrapassar os 5Mb.</p>
                            <div class="container-fluid">
                                <div class="row">
                                    @if(file_exists(public_path() . '/storage/' . $training->image))
                                    <img width="50%" src="{{ asset('storage/' . $training->image) }}" />
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success" role="button">Actualizar</button>
                        <a href="{{ route('admin.trainings.index') }}" class="btn btn-default">Cancelar</a>
                    </diva>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@stop

@section('required-js-scripts')
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
@stop

@section('page-script')
<!-- page script -->
<script>
    $(function () {
        //Date range picker with time picker
        $('#datetime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            timePicker24Hour: true,
            autoApply: true,
            locale: daterangepicker_locales
        });
    });
</script>
@stop
