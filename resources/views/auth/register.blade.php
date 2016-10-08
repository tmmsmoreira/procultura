@include('footer')

@extends('layout')

@section('content')
<div id="register" class="site-wrapper">
    <section class="register" style="position:relative;width:100%;">
        <div class="container" style="padding:90px 0">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Registo</div>
                        <div class="panel-body">
                            @if (app('request')->input('p') == "companies")
                                @include('auth.r_companies')
                            @elseif (app('request')->input('p') == "freelancer")
                                @include('auth.r_freelancer')
                            @else
                                @include('auth.r_general')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @yield('footer')
</div>
@endsection
