@include('web.footer')

@extends('web.layouts.main')

@section('content')
<div id="what-we-do" class="site-wrapper">
    <section style="position:relative;width:100%;">
        <div class="container marketing" style="padding:70px 0">
            <div class="row">
                <h1 class="section-title">O que fazemos?</h1>
            </div>
            <div class="row">
                <p>A Procultura atua no setor cultural nacional com o intuito de divulgar e disseminar gratuitamente a programação cultural dos diversos espaços culturais, públicos ou privados. Simultaneamente estabelece a mediação entre a oferta e a procura, quer da programação cultural, quer de profissionais culturais e as entidades culturais.</p>
                <p>Esta plataforma terá várias funções:</p>
                <ul>
                    <li>Anunciar a oferta cultural para o público em geral.</li>
                    <li>Anunciar serviços ou produtos culturais para programadores que queiram contactar com profissionais das artes, organizações, associações, centros culturais, profissionais liberais, etc.</li>
                    <li>Anunciar ofertas de emprego da área cultural.</li>
                    <li>Anunciar ofertas de emprego da área cultural.</li>
                    <li>Publicar artigos/papers/estudos na área cultural</li>
                </ul>
            </div>
        </div>
    </section>

    @yield('footer')

    </div>
@endsection
