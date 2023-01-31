@extends('layouts.app')

@section('content')

<header class="bg-primary text-center text-light pb-5">
    <div class="container align-items-center">
        <img class="mt-5" src="{{ asset('img/avataaars.svg') }}" alt="" height="250px" width="250px">
        <div class="mast-hr"><hr></div>
        <h1>Wyatt Johnson</h1>
        <h3 class="subheading">Software Engineer</h3>
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
                    <div class="card-header"><h2>{{ $project->title }}</h2></div>
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
                            <?php echo html_entity_decode($project->description); ?>
                        </div>
                        <div class="modal-footer" style="border-top: solid 1px #222c3b">
                            <button type="button" class="btn btn-warning text-light mr-auto" data-dismiss="modal">Close</button>
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

<!-- About Section -->
<section class="about pb-5 bg-primary text-light" id="about">
    <div class="container">
        <h2 class="section-header">ABOUT</h2>
        <div class="mast-hr"><hr></div>
        <div class="row text-justify mt-4">
            <div class="col-md-3"></div>
            <div class="col-md-12 col-lg-3"><p>My name is Wyatt Johnson. I'm a Software Engineer in Logan, Utah. I really like back-end development. I prefer to work with the base functions of web apps rather than UI design.</p>
            <p>I recently graduated from the Web & Mobile Development program at Bridgerland Technical College and I am currently employed as a Web eCommerce Developer at the worlds largest provider of fitness equipment, which is based here in Cache Valley. And here's a photo of me!</p></div>
            <div class="col-md-12 col-lg-3 text-center"><img class="profile-image rounded" src="{{ asset('storage/img/profileImage.jpg') }}" alt="profile image"></div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>

<!-- Contact Section -->
@if(Session::has('mail'))
    <div class='over'></div>
@endif
<section class="contact pb-5" id="contact">
    <div class="container contact-section">
        <h2 class="section-header">CONTACT</h2>
        <div class="section-hr"><hr></div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('contact') }}" class="contact-form" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 col-lg-6">
                    <input class="form-control trans-light mb-3" type="text" name="name" placeholder="Full Name" value="{{ old('name') }}">
                </div>
                <div class="col-12 col-lg-6 mb-3">
                    <input class="form-control trans-light" type="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
                </div>
                <div class="col-12 mb-3">
                    <textarea class="form-control trans-light" rows="5" name="message" placeholder="Message">{{ old('message') }}</textarea>
                </div>
                <div class="col-12 col-lg-4">
                    <input type="submit" class="form-control btn btn-primary" value="Send &nbsp; &raquo;">
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
