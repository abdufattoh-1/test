@extends('app')

@section('content')
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <i class="fas fa-film mr-2"></i>
            Catalog-Z
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link nav-link-1" aria-current="page" href="/">Photos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-2" href="/videos">Videos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-3" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-4 active" href="/contact">Contact</a>
            </li>
        </ul>
        </div>
    </div>
</nav>
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/hero.jpg"></div>

    <div class="container-fluid tm-mt-60">
        <div class="row tm-mb-50">
            <div class="col-lg-4 col-12 mb-5">
                <h2 class="tm-text-primary mb-5">Contact Page</h2>
                <form id="contact-form" action="" method="POST" class="tm-contact-form mx-auto">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control rounded-0" placeholder="Name" required />
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control rounded-0" placeholder="Email" required />
                    </div>
                    <div class="form-group">
                        <input type="text" name="tel" class="form-control rounded-0" placeholder="Phone" required />
                    </div>
                    <div class="form-group">
                        <textarea rows="8" name="message" class="form-control rounded-0" placeholder="Message" required=></textarea>
                    </div>

                    <div class="form-group tm-text-right">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>                
            </div>
            <div class="col-lg-4 col-12 mb-5">
                @foreach($adres as $ads)
                <div class="tm-address-col">
                    <h2 class="tm-text-primary mb-5">Our Address</h2>
                    <p class="tm-mb-50">{{$ads->info}}</p>
                        
                    {{-- <p class="tm-mb-50">Nulla ut scelerisque elit, in fermentum ante. Aliquam congue mattis erat, eget iaculis enim posuere nec. Quisque risus turpis, tempus in iaculis.</p> --}}
                    <address class="tm-text-gray tm-mb-50">
                        {!!$ads->adres!!}
                    </address>
                    <ul class="tm-contacts">
                        <li>
                            <a href="#" class="tm-text-gray">
                                <i class="fas fa-envelope"></i>
                                {{$ads->email}}
                            </a>
                        </li>
                        <li>
                            <a href="{{$ads->tel}}" class="tm-text-gray">
                                <i class="fas fa-phone"></i>
                                Tel: {{$ads->tel}}
                            </a>
                        </li>
                        <li>
                            <a href="{{$ads->url_adres}}" class="tm-text-gray">
                                <i class="fas fa-globe"></i>
                                URL: {{$ads->url_adres}}
                            </a>
                        </li>
                    </ul>
                </div>                
                @endforeach
            </div>
            <div class="col-lg-4 col-12">
                <h2 class="tm-text-primary mb-5">Our Location</h2>
                <!-- Map -->
                <div class="mapouter mb-4">
                    <div class="gmap-canvas">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d97132.20855361782!2d71.6630860623117!3d40.46682396428103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38bb77c1512b5cd3%3A0xdbff3671b64d48b7!2z0JzQsNGA0LPQuNC70LDQvSwg0KPQt9Cx0LXQutC40YHRgtCw0L0!5e0!3m2!1sru!2s!4v1649758249093!5m2!1sru!2s" 
                        width="100%" height="520" style="border:0;" 
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        ></iframe>
                    </div>
                </div>               
            </div>
        </div>
        <div class="row tm-mb-74 tm-people-row">
            @foreach($collective as $coll)
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-5">
                    <img src="{{asset($coll->imag)}}" alt="Image" class="mb-4 img-fluid">
                    <h2 class="tm-text-primary mb-4">{{$coll->name}}</h2>
                    <h3 class="tm-text-secondary h5 mb-4">{{$coll->titles}}</h3>
                    <p class="mb-4">
                        {{$coll->about}}
                    </p>
                    <ul class="tm-social pl-0 mb-0">
                        <li><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://linkedin.com"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            @endforeach
            {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-5">
                <img src="img/people-2.jpg" alt="Image" class="mb-4 img-fluid">
                <h2 class="tm-text-primary mb-4">Catherine Pinky</h2>
                <h3 class="tm-text-secondary h5 mb-4">Chief Marketing Officer</h3>
                <p class="mb-4">
                    Sed faucibus nec velit finibus accumsan. Sed varius augue et leo pharetra, in varius lacus eleifend. Quisque ut eleifend lacus.
                </p>
                <ul class="tm-social pl-0 mb-0">
                    <li><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://linkedin.com"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-5">
                <img src="img/people-3.jpg" alt="Image" class="mb-4 img-fluid">
                <h2 class="tm-text-primary mb-4">Johnny Brief</h2>
                <h3 class="tm-text-secondary h5 mb-4">Accounting Executive</h3>
                <p class="mb-4">
                    Sed faucibus nec velit finibus accumsan. Sed varius augue et leo pharetra, in varius lacus eleifend. Quisque ut eleifend lacus.
                </p>
                <ul class="tm-social pl-0 mb-0">
                    <li><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://linkedin.com"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-5">
                <img src="img/people-4.jpg" alt="Image" class="mb-4 img-fluid">
                <h2 class="tm-text-primary mb-4">George Nelson</h2>
                <h3 class="tm-text-secondary h5 mb-4">Creative Art Director #C69</h3>
                <p class="mb-4">
                    Nunc convallis facilisis congue. Curabitur gravida rutrum justo sed pulvinar. Pellentesque ac ante in erat bibendum dignissim.
                </p>
                <ul class="tm-social pl-0 mb-0">
                    <li><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://linkedin.com"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div> --}}
        </div>
    </div> <!-- container-fluid, tm-container-content -->

@endsection