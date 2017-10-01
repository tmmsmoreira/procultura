@include('web.footer')

@extends('web.layouts.main')

@section('required-css-files')
<!-- daterange picker -->
<link rel="stylesheet" href="/plugins/datepicker/datepicker3.css">
@stop

@section('content')
<div id="events" class="site-wrapper">
    <section class="events-calendar">
        <div class="container">
            <p class="h1 section-title">Agenda Cultural</p>
        </div>
        <div class="container" style="padding-bottom:30px">
            <form class="form-inline" method="GET" action="/events">
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="sr-only" for="key-word">Palavras Chave</label>
                        <input id="key-word" name="keyword" style="width:100%" class="form-control input-lg"
                            type="text" placeholder="Palavras Chave" value="{{ app('request')->input('keyword') }}">
                    </div>
                    <div class="form-group col-sm-3">
                        <label class="sr-only" for="location">Location</label>
                        <select id="location" name="location" style="width:100%" class="form-control input-lg">
                            <option value="">Local...</option>
                            @foreach($locations as $i=>$location)
                            <option value="{{ $location->location }}"
                                @if($location->location == app('request')->input('location'))
                                    {{ 'selected' }}
                                @endif
                            >
                                {{ $location->location }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-3">
                        <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                            <input type="text" name="date" style="width:100%" class="form-control input-lg">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <button type="submit" style="width:100%" class="btn btn-default btn-lg">Procurar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="container">
            <div class="row">
                @foreach($events as $i=>$event)
                <div class="col-sm-4" style="padding-bottom:30px">
                    <div class="fig-hover-item" style="background-image:url('{{ asset('storage/' . $event->image) }}')">
                        <div class="fig-hover-item-content text-center">
                            <div class="overlay">
                                <div class="overlay-color"></div>
                                <div class="overlay-content">
                                    <div class="vertical-center" style="height:100%">
                                        <div class="centered">
                                            <h3>{{ $event->title }}</h3>
                                            <h4>{{ $event->location }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('events.show', ['event' => $event->id]) }}" class="full-link"></a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
                @endforeach
            </div>
            <!--<div class="jumbotron">
                <div id="calendar"></div>
            </div>-->
        </div>
    </section>

    @yield('footer')
</div>
@stop

@section('required-js-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="/plugins/datepicker/locales/bootstrap-datepicker.pt.js"></script>
@stop

@section('page-script')
<script>
    $(function () {
        $('.datepicker').datepicker();
    });
</script>
@stop
