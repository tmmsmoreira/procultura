@include('footer')

@extends('layouts.main')

@section('required-css-files')
<!-- daterange picker -->
<link rel="stylesheet" href="/plugins/fullcalendar/fullcalendar.min.css">
@stop

@section('content')
<div id="events" class="site-wrapper">
    <section class="events-calendar">
        <div class="row">
            <p class="h1 section-title">Agenda Cultural</p>
        </div>
        <div class="container">
            <div class="jumbotron">
                <div id="calendar"></div>
            </div>
        </div>
    </section>

    @yield('footer')
</div>
@stop

@section('required-js-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="/plugins/fullcalendar/locale/pt.js"></script>
@stop

@section('page-script')
<script>
    $(function () {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'Hoje',
                month: 'Mês',
                week: 'Semana',
                day: 'Dia'
            },
            events: {
                url: '/events/lazy',
                type: 'POST',
                error: function() {
                    alert('there was an error while fetching events!');
                }
            },
            editable: false,
            lazyFetching: true,
            locale: "pt",
            color: "#B20000"
        });
    });
</script>
@stop
