<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ProCultura</title>

        <link href="css/app.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img height="100%" alt="ProCultura" src="imgs/logo.png"></a>
                </div>
    			<div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a class="text-uppercase" href="#">Agenda Cultural</a></li>
                        <li><a class="text-uppercase" href="#about">Emprego</a></li>
                        <li><a class="text-uppercase" href="#contact">Formação</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    	<li><a class="text-uppercase" href="#login">Login</a></li>
                    </ul>
    			</div><!--/.nav-collapse -->
            </div>
        </nav>

        @yield('content')
        <script src="js/app.js" type="text/javascript"></script>
    </body>
</html>
