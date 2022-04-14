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
                <a class="nav-link nav-link-1 active" aria-current="page" href="/">Photos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-2" href="/videos">Videos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-3" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-4" href="/contact">Contact</a>
            </li>
        </ul>
        </div>
    </div>
</nav>
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="{{asset('img/hero.jpg')}}">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">{{$images->name}}</h2>
        </div>
        <div class="row tm-mb-90">            
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                <img src="{{asset($images->image)}}" alt="Image" class="img-fluid">
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="tm-bg-gray tm-video-details">
                    {{-- <p class="mb-4">
                        Please support us by making <a href="https://paypal.me/templatemo" target="_parent" rel="sponsored">a PayPal donation</a>. Nam ex nibh, efficitur eget libero ut, placerat aliquet justo. Cras nec varius leo.
                    </p> --}}
                    <div class="text-center mb-5">
                        <a href="{{route('getfile', $images->image)}}" class="btn btn-primary tm-btn-big">Download</a>
                    </div>                    
                    <div class="mb-4 d-flex flex-wrap">
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Dimension: </span><span class="tm-text-primary">1920x1080</span>
                        </div>{{Str::upper(Str::substr($images->image, 48))}}
                        <div class="mr-4 mb-2">
                            {{-- <span class="tm-text-gray-dark">Format: </span><span class="tm-text-primary">{{$images->image->extension()}}</span> --}}
                        </div>
                    </div>
                    <div class="mb-4">
                        <h3 class="tm-text-gray-dark mb-3">{{$images->name}}</h3>
                        <p>{{$images->info}}</p>
                    </div>
                    <div>
                        {{-- <h3 class="tm-text-gray-dark mb-3">{{$images->tag}}</h3> --}}
                        {{-- <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Cloud</a>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Bluesky</a>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Nature</a>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Background</a>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Timelapse</a>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Night</a>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Real Estate</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                Related Photos
            </h2>
        </div>
        <div class="row mb-3 tm-gallery">
            @foreach($rand as $ran)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="{{asset($ran->image)}}" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{$ran->name}}</h2>
                            <a href="/photo-detail/{{$ran->id}}">View more</a>
                        </figcaption>                    
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">{{$ran->created_at->format('d M Y')}}</span>
                        <span>{{$ran->views}} views</span>
                    </div>
                </div>       
                
            @endforeach
        </div>
    </div>

 @endsection