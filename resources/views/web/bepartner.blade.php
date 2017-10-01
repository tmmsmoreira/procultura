@include('web.footer')

@extends('web.layouts.main')

@section('content')
<div id="be-partner" class="site-wrapper">
    <section style="position:relative;width:100%;">
        <div class="container marketing" style="padding:70px 0">
            <div class="row">
                <h1 class="section-title">Torne-se Parceiro</h1>
            </div>
            <div class="row">
                <p>Envie-nos um e-mail para <a href="mailto:geral@procultura.pt">geral@procultura.pt</a> para saber mais informações sobre as condições para se tornar nosso parceiro.</p>
            </div>
        </div>
    </section>

    @yield('footer')

    </div>
@endsection
