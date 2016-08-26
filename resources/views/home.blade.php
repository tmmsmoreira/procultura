@extends('layout')

@section('content')
<div class="site-wrapper">
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
</section><!-- /agenda -->
<section class="home-emprego">
    <div class="container marketing" style="padding-top:50px">
        <!-- Three columns of text below the carousel -->
        <div class="row">
            <p class="h3 text-center text-uppercase" style="margin-bottom:40px">Emprego</p>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="square" style="background-image:url(images/job1.jpg);">
                  <div class="square-content">
                      <div class="overlay">
                          <div class="overlay-color" style="background-color:#dd8b78"></div>
                          <div class="overlay-content">
                              <a href="">
                                  <h3>Job 1</h3>
                                  <h4>Lisboa</h4>
                              </a>
                              <a href="/en/webdesign/restaurant-kok-au-vin-brugge/">View project</a>
                          </div>
                          <a href="/en/webdesign/restaurant-kok-au-vin-brugge/" class="full-link"></a>
                      </div>
                  </div>
                </div>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <div class="square" style="background-image:url(images/job2.jpg);">
                  <div class="square-content">
                      <div class="overlay">
                          <div class="overlay-color" style="background-color:#dd8b78"></div>
                          <div class="overlay-content">
                              <a href="">
                                  <h3>Job 2</h3>
                                  <h4>Lisboa</h4>
                              </a>
                              <a href="/en/webdesign/restaurant-kok-au-vin-brugge/">View project</a>
                          </div>
                          <a href="/en/webdesign/restaurant-kok-au-vin-brugge/" class="full-link"></a>
                      </div>
                  </div>
                </div>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <div class="square" style="background-image:url(images/job3.jpg);">
                  <div class="square-content">
                      <div class="overlay">
                          <div class="overlay-color" style="background-color:#dd8b78"></div>
                          <div class="overlay-content">
                              <a href="">
                                  <h3>Job 3</h3>
                                  <h4>Lisboa</h4>
                              </a>
                              <a href="/en/webdesign/restaurant-kok-au-vin-brugge/">View project</a>
                          </div>
                          <a href="/en/webdesign/restaurant-kok-au-vin-brugge/" class="full-link"></a>
                      </div>
                  </div>
                </div>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>© 2016 Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
      </footer>

    </div>
</section>
  <!-- /first section -->
  </div>
@stop
