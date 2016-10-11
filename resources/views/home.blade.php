@include('footer')

@extends('layouts.main')

@section('content')
<div id="home" class="site-wrapper">
    <!-- first section - Home -->
    <section class="home-agenda">
        <div id="home-carousel" class="carousel slide full-height" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#home-carousel" data-slide-to="1"></li>
                <li data-target="#home-carousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="images/1.jpg" alt="...">
                    <div class="carousel-caption">
                      ...
                    </div>
                </div>
                <div class="item">
                    <img src="images/2.jpg" alt="...">
                    <div class="carousel-caption">
                      ...
                    </div>
                </div>
                <div class="item">
                    <img src="images/3.jpg" alt="...">
                    <div class="carousel-caption">
                      ...
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#home-carousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#home-carousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section><!-- /home-agenda -->
    <section class="home-emprego">
        <div class="container marketing" style="padding:50px 0">
            <div class="row">
                <p class="h1 section-title">Emprego</p>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="fig-hover-item" style="background-image:url(images/job1.jpg);">
                        <a href="" class="full-link"></a>
                        <div class="fig-hover-item-content text-center">
                            <div class="overlay">
                                <div class="overlay-color"></div>
                                <div class="overlay-content">
                                    <div class="vertical-center" style="height:100%">
                                        <div class="centered">
                                            <h3>Job 1</h3>
                                            <h4>Lisboa</h4>
                                            View project
                                        </div>
                                    </div>
                                </div>
                                <a href="" class="full-link"></a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="fig-hover-item" style="background-image:url(images/job2.jpg);">
                        <a href="" class="full-link"></a>
                        <div class="fig-hover-item-content text-center">
                            <div class="overlay">
                                <div class="overlay-color"></div>
                                <div class="overlay-content">
                                    <div class="vertical-center" style="height:100%">
                                        <div class="centered">
                                            <h3>Job 1</h3>
                                            <h4>Lisboa</h4>
                                            View project
                                        </div>
                                    </div>
                                </div>
                                <a href="" class="full-link"></a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="fig-hover-item" style="background-image:url(images/job3.jpg);">
                        <a href="" class="full-link"></a>
                        <div class="fig-hover-item-content text-center">
                            <div class="overlay">
                                <div class="overlay-color"></div>
                                <div class="overlay-content">
                                    <div class="vertical-center" style="height:100%">
                                        <div class="centered">
                                            <h3>Job 1</h3>
                                            <h4>Lisboa</h4>
                                            View project
                                        </div>
                                    </div>
                                </div>
                                <a href="" class="full-link"></a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
            <div class="row">

            </div>
          <!-- /END THE FEATURETTES -->
        </div>
    </section><!-- /home-empregos -->
    <section class="home-servicos" style="background:url(imgs/services.jpg) no-repeat center center; background-size:cover">
        <div class="container marketing" style="padding:50px 0">
            <div class="row">
                <p class="h1 section-title white">Serviços Culturais</p>
            </div>
            <div class="row">
                <p class="h3 section-text white">Ofertas de serviços e produtos culturais recentes. identificando as opções ideais para cada situação. Tem à disposição uma ferramenta de pesquisa para esses mesmos produtos e serviços, de forma a ajustar as suas necessidades.<br/>
                <p class="h3 section-text white"><i>“Identificar as opções e vocações na elaboração de um projeto social ou cultural é uma tarefa que deve ser executada nos mínimos detalhes.”</i></p>
            </div>
        </div>
    </section>
    <section class="home-formacao" style="background-color:#B40505">
        <div class="container marketing" style="padding:50px 0">
            <div class="row">
                <p class="h1 section-title white">Formação</p>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="fig-hover-item img-circle" style="background-image:url(images/job1.jpg);">
                        <a href="" class="full-link"></a>
                        <div class="fig-hover-item-content text-center">
                            <div class="overlay img-circle">
                                <div class="overlay-color img-circle"></div>
                                <div class="overlay-content">
                                    <div class="vertical-center" style="height:100%">
                                        <div class="centered">
                                            <h3>Job 1</h3>
                                            <h4>Lisboa</h4>
                                            View project
                                        </div>
                                    </div>
                                </div>
                                <a href="" class="full-link"></a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="fig-hover-item img-circle" style="background-image:url(images/job2.jpg);">
                        <a href="" class="full-link"></a>
                        <div class="fig-hover-item-content text-center">
                            <div class="overlay img-circle">
                                <div class="overlay-color img-circle"></div>
                                <div class="overlay-content">
                                    <div class="vertical-center" style="height:100%">
                                        <div class="centered">
                                            <h3>Job 1</h3>
                                            <h4>Lisboa</h4>
                                            View project
                                        </div>
                                    </div>
                                </div>
                                <a href="" class="full-link"></a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="fig-hover-item img-circle" style="background-image:url(images/job3.jpg);">
                        <a href="" class="full-link"></a>
                        <div class="fig-hover-item-content text-center">
                            <div class="overlay img-circle">
                                <div class="overlay-color img-circle"></div>
                                <div class="overlay-content">
                                    <div class="vertical-center" style="height:100%">
                                        <div class="centered">
                                            <h3>Job 1</h3>
                                            <h4>Lisboa</h4>
                                            View project
                                        </div>
                                    </div>
                                </div>
                                <a href="" class="full-link"></a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
            <div class="row">

            </div>
        </div>
    </section>
    <section class="home-estudos" style="background:url(imgs/studies.jpg) no-repeat center center; background-size:cover">
        <div class="container marketing" style="padding:50px 0">
            <div class="row">
                <p class="h1 section-title white">Estudos Culturais</p>
            </div>
            <div class="row">
                <p class="h3 section-text white">A Cultura, como área de investigação universitária autónoma data sensivelmente dos anos 70, sobretudo pela necessidade de criar um domínio interdisciplinar onde a diversidade fragmentária das ciências que estudam o homem e as suas diferentes produções culturais, pudessem ser confrontadas entre si.</p>
                <p class="h3 section-text white">Aqui pode consultar alguns artigos e estudos ciêntificos, crónicas ou manuais de interesse para área cultural, partilhados por diversos utilizadores.</p>
            </div>
        </div>
    </section>
    <section class="home-anuncios">
        <div class="container">
            <div class="row">

            </div>
        </div>
        <div style="position:absolute;width:100%;bottom:0;background:black;">
            <div class="container" style="height:100%">
                <form class="form-inline" style="padding:10px">
                    <div class="form-group form-group-lg">
                        <p class="form-control-static" style="color:white">Subscreva a nossa newsletter e receba novidades no seu email uma vez por semana!</p>
                    </div>
                    <div class="pull-right">
                        <div class="form-group form-group-lg">
                            <input type="email" class="form-control" id="email" placeholder="Insira do seu email">
                        </div>
                        <button type="submit" class="btn btn-lg">Subscrever</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @yield('footer')

</div>
@stop
