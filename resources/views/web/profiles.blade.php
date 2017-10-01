@include('web.footer')

@extends('web.layouts.main')

@section('content')
<div id="profiles" class="site-wrapper">
    <section class="profiles" style="height:100%;position:relative;width:100%;">
        <div class="container marketing" style="padding:70px 0">
            <div class="row">
                <p class="h1 section-title">Qual o seu perfil?</p>
            </div>
            <div class="row">
                @foreach ($profiles as $profile)
                <div class="col-lg-{{ 12 / count($profiles) }}">
                    <div class="fig-hover-item img-circle" style="background-image:url(imgs/{{ $profile->key }}.jpg);">
                        <div class="fig-hover-item-content text-center">
                            <div class="overlay img-circle">
                                <div class="overlay-color img-circle"></div>
                                <div class="overlay-content">
                                    <div class="vertical-center" style="height:100%">
                                        <div class="centered">
                                            <div style="padding:21px">
                                                <h3>{{ $profile->name }}</h3>
                                                <h4>{{ $profile->description }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="/register?p={{ $profile->key }}" class="full-link"></a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
                @endforeach
            </div><!-- /.row -->
        </div>
    </section>

    @yield('footer')

    </div>
@endsection
