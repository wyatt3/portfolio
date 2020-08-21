@extends('layouts.app')

@section('content')

<header class="bg-primary text-center text-light pb-5">
    <div class="container align-items-center">
        <img class="mt-5" src="{{ asset('img/avataaars.svg') }}" alt="" height="250px" width="250px">
        <div class="mast-hr"><hr></div>
        <h1>Wyatt Johnson</h1>
        <h3 class="subheading">Web Developer</h3>
    </div>
</header >
<section class="portfolio" id="portfolio">
    <div class="container">
        <h2 class="section-header">PORTFOLIO</h2>
        <div class="section-hr"><hr></div>
        <div class="row">
            @foreach($projects as $project)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card text-light bg-dark mb-4">
                    <div class="card-header"><h1>{{ $project->title }}</h1></div>
                    <div class="card-body">
                        {{ $project->description }}
                    </div>
                    <div class="card-footer"><a class="btn btn-primary" target="_blank" href="{{ $project->link }}">Take Me To This Site</a></div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $projects->fragment('portfolio')->links() }}
    </div>
</section>

<footer class="bg-secondary text-primary" id="additional-info">
            <div class="container">
                <div class="row text-center py-5">
                    <div class="col-md-12 col-lg-4">
                        <h3>Location<i class="foundicon-location"></i></h3>
                        <p>Logan, Utah<br>
                        United States, 84321</p>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <h3>Download my Resume <i class="foundicon-page"></i></h3>
                        <a class="btn btn-primary text-light" href="assets/WyattJohnson.pdf" Download>Download WyattJohnson.pdf &nbsp;<i class="foundicon-inbox"></i></a>
                        <br>
                        <br>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <h3>My Social Media <i class="foundicon-globe"></i></h3>
                        <p>
                            <a target="_blank" href="https://www.linkedin.com/in/wyatt-johnson-aa50421a3/"><i class="foundiconsoc-linkedin"></i> LinkedIn</a><br>
                            <a target="_blank" href="https://www.instagram.com/wyatt.johnson_/"><i class="foundiconsoc-instagram"></i> Instagram</a><br>
                            <a target="_blank" href="https://www.facebook.com/wyatt.johnson.12177/"><i class="foundiconsoc-facebook"></i> Facebook</a><br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-dark d-block text-primary pr-3 pt-3 text-right">
                <p class="float-left ml-3"><a href="{{ route('login') }}">Login</a></p>
                <p>&copy; 2020 Wyatt Johnson</p>
            </div>
        </footer>
@endsection