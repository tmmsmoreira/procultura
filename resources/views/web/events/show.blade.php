@include('web.footer')

@extends('web.layouts.main')

@section('content')
<div id="event" class="site-wrapper">
    <section class="event">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4" style="overflow:hidden;padding:0">
                    <img class="full-height" src='{{ asset('storage/' . $event->image) }}' />
                </div>
                <div class="col-md-8">
                    <h1 class="section-title">{{ $event->title }}</h1>
                    <p>{{ $event->description }}</p>

                </div>
            </div>
        </div>
    </section>

    @yield('footer')

</div>
@stop

@section('required-js-scripts')

@stop

@section('page-script')

@stop
