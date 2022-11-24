<!DOCTYPE html>
<html lang="en">
    <head>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-177832403-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-177832403-1');
	</script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Wyatt Johnson">
	<meta name="description" content="Wyatt Johnson. A Web Developer based in Logan, UT. I specialize in the Laravel framework, and mostly focus on back-end development. This is my portfolio site.">
	<meta http-equiv="Content-Type" content="text/html; charset=utf8">
        <title>Wyatt Johnson - Web Developer Portfolio</title>
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
        <!-- Font Awesome icons -->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/overhang.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mytheme.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/social_foundicons.css') }}" rel="stylesheet">
        <link href="{{ asset('css/general_foundicons.css') }}" rel="stylesheet">
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg bg-dark text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Wyatt Johnson</a><button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-light rounded py-2" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 js-scroll-trigger" href="#portfolio"><i class="foundicon-folder"></i> Portfolio</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 js-scroll-trigger" href="#updates"><i class="foundicon-website"></i> Updates</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 js-scroll-trigger" href="#about"><i class="foundiconsoc-torso"></i> About Me</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 js-scroll-trigger" href="#contact"><i class="foundicon-mail"></i> Contact Me</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 js-scroll-trigger" href="#additional-info">Additional Info</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
       
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="{{ asset('js/overhang.min.js') }}"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
	<script type="application/ld+json">{"@context": "http://schema.org","@type": "Organization","name": "Wyatt Johnson","url": "https://www.wyattjohnson.net","sameAs": ["https://www.facebook.com/wyatt.johnson12177/","https://www.instagram.com/wyatt.johnson_/","https://www.linkedin.com/in/wyatt-johnson-aa50421a3/"]}</script>
    </body>
</html>
