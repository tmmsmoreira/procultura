@include('web.footer')

@extends('web.layouts.main')

@section('content')
<div id="about" class="site-wrapper">
    <section class="about" style="position:relative;width:100%;">
        <div class="container marketing" style="padding:70px 0">
            <div class="row">
                <h1 class="section-title">Quem somos?</h1>
            </div>
            <div class="row">
                <p>A <b>ProCultura</b> é uma plataforma que agrega informação sobre a programação cultural existente nos diversos espaços culturais do território nacional, públicos ou privados, quer seja numa pequena localidade ou numa grande cidade de Portugal.</p>
                <p>A <b>ProCultura</b> visa estabelecer uma rede de profissionais da área cultural, servindo de mediador entre a oferta e a procura, bem como, promover sinergias no desenvolvimento da programação cultural nacional.</p>
                <p><b>A nossa equipa</b> é multidisciplinar, sendo constituída por profissionais da comunicação e marketing cultural, programação e produção cultural, programação web e design.</p>
            </div>
        </div>
    </section>

    @yield('footer')

    </div>
@endsection
