@include('web.footer')

@extends('web.layouts.main')

@section('content')
<div class="site-wrapper">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4" style="overflow:hidden;padding:0">
                    <img class="full-height" src='{{ asset('storage/' . $training->image) }}' />
                </div>
                <div class="col-md-8">
                    <h1 class="section-title">{{ $training->title }}</h1>
                    <p>{{ $training->description }}</p>
                </div>
            </div>
        </div>
    </section>

    @yield('footer')

</div>
@stop
