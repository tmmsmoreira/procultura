@include('web.footer')

@extends('web.layouts.main')

@section('content')
<div id="our-partners" class="site-wrapper">
    <section style="position:relative;width:100%;">
        <div class="container marketing" style="padding:70px 0">
            <div class="row">
                <h1 class="section-title">Os Nossos Parceiros</h1>
            </div>
            <div class="row">
                <p>Os nossos parceiros são entidades públicas e privadas que atuam no setor cultural e/ou que têm em comum o nosso público-alvo.</p>
            </div>
        </div>
    </section>

    @yield('footer')

    </div>
@endsection
