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
<!-- Portfolio Section -->
<section class="portfolio" id="portfolio">
    <div class="container">
        <h2 class="section-header">PORTFOLIO</h2>
        <div class="section-hr"><hr></div>
        <div class="row">
            @foreach($projects as $project)
            <div class="col-12 col-md-6 col-lg-4">
                <a class="text-light text-decoration-none" href="#" data-toggle="modal" data-target="#modal-project-{{ $project->id }}">
                <div class="card project-card text-light bg-dark mb-4">
                    <div class="card-header"><h1>{{ $project->title }}</h1></div>
                    <div class="card-body project-card-body">
                        {{ $project->oneline }}
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-block btn-primary" href="#" data-toggle="modal" data-target="#modal-project-{{ $project->id }}">More Info</a>
                    </div>
                </div>
                </a>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modal-project-{{ $project->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-secondary text-light">
                        <div class="modal-header" style="border-bottom: solid 1px #222c3b">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $project->title }}</h5>
                            <button type="button" class="close text-light" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            {{ $project->description }}
                        </div>
                        <div class="modal-footer" style="border-top: solid 1px #222c3b">
                            <button type="button" class="btn btn-warning mr-auto" data-dismiss="modal">Close</button>
                            <a href="{{ $project->link }}" target="_blank" type="button" class="btn btn-primary">Take Me To This Site</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $projects->fragment('portfolio')->links() }}
    </div>
</section>

<!-- Updates Section -->
<section class="updates bg-primary text-light pb-5" id="updates">
    <div class="container">
        <h2 class="section-header">UPDATES</h2>
        <div class="mast-hr"><hr></div>
        <div class="row">
            @foreach($updates as $post)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card update-card bg-dark mb-4">
                        <div class="card-header">
                            {{ $post->title }}<br>
                            Posted: {{ date_format($post->created_at, 'M jS, Y') }}
                        </div>
                        <div class="card-body">
                            {{ $post->content }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $updates->fragment('updates')->links('vendor.pagination.dark') }}
    </div>
</section>

<!-- About Section -->
<section class="about pb-5" id="about">
    <div class="container">
        <h2 class="section-header">ABOUT</h2>
        <div class="section-hr"><hr></div>
        <div class="row text-justify mt-4">
            <div class="col-md-3"></div>
            <div class="col-md-12 col-lg-3"><p>My name is Wyatt Johnson. I'm a soon-to-be graduated Web Developer, and I live in Logan, UT. I really like back-end development. I prefer to work with the base functions of web apps rather than UI design.</p>
            <p>I am currently enrolled in the Web & Mobile Development program at Bridgerland Technical College. I am 960 hours into the 1050-hour program.</p></div>
            <div class="col-md-12 col-lg-3 text-center"><img class="profile-image rounded" src="{{ asset('storage/img/profileImage.jpg') }}" alt="profile image"></div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<?php
    if (false) {
        echo "<div class='over'></div>";
        // mail("wyatt.j1834@gmail.com", "Contact - ".$_POST["name"], "Reply Email: ".$_POST["email"]." ".$_POST["message"]);
    }
?>
<section class="contact bg-primary text-light pb-5" id="contact">
    <div class="container contact-section">
        <h2 class="section-header">CONTACT</h2>
        <div class="mast-hr"><hr></div>
        <form action="#contact" class="contact-form" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 col-lg-6">
                    <input class="form-control trans-light mb-3" type="text" name="name" placeholder="Full Name">
                </div>
                <div class="col-12 col-lg-6 mb-3">
                    <input class="form-control trans-light" type="email" name="email" placeholder="Email Address">
                </div>
                <div class="col-12 mb-3">
                    <textarea class="form-control trans-light" rows="5" name="message" placeholder="Message"></textarea>
                </div>
                <div class="col-12 col-lg-4">
                    <input type="submit" class="form-control btn btn-secondary" value="Send &nbsp; &raquo;">
                </div>
            </div>
        </form>
    </div>
</section>

<!-- More Info Section -->
<footer class="bg-secondary text-primary" id="additional-info">
            <div class="container">
                <div class="row text-center py-5">
                    <div class="col-md-12 col-lg-4">
                        <h3><i class="foundicon-location"></i> Location <i class="foundicon-location"></i></h3>
                        <p>Logan, Utah<br>
                        United States, 84321</p>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <h3><i class="foundicon-edit"></i> Download my Resume <i class="foundicon-edit"></i></h3>
                        <a class="btn btn-primary text-light" href="{{ asset('storage/WyattJohnson.pdf') }}" Download>Download WyattJohnson.pdf <i class="foundicon-inbox"></i></a>
                        <br>
                        <br>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <h3><i class="foundicon-globe"></i> My Social Media <i class="foundicon-globe"></i></h3>
                        <p>
                            <a target="_blank" href="https://www.linkedin.com/in/wyatt-johnson-aa50421a3/"><i class="foundiconsoc-linkedin"></i> LinkedIn</a><br>
                            <a target="_blank" href="https://www.instagram.com/wyatt.johnson_/"><i class="foundiconsoc-instagram"></i> Instagram</a><br>
                            <a target="_blank" href="https://www.facebook.com/wyatt.johnson.12177/"><i class="foundiconsoc-facebook"></i> Facebook</a><br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-dark d-block text-primary pr-3 pt-3 text-right">
                <p class="float-left ml-3"><a href="{{ route('login') }}">
                @if (Auth::user())
                    Admin
                @else
                    Login
                @endif
                </a></p>
                <p>&copy; 2020 Wyatt Johnson</p>
            </div>
        </footer>
@endsection