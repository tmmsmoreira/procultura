@include('web.footer')

@extends('web.layouts.main')

@section('content')
<div id="job" class="site-wrapper">
    <section class="job">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4" style="overflow:hidden;padding:0">
                    <img class="full-height" src='{{ asset('storage/' . $job->image) }}' />
                </div>
                <div class="col-md-8">
                    <h1 class="section-title">{{ $job->title }}</h1>
                    <p>{{ $job->description }}</p>

                </div>
            </div>
        </div>
    </section>

    @yield('footer')

</div>
@stop
