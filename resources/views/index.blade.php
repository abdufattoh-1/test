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
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/hero.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Latest Photos
            </h2>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <form action="" class="tm-text-primary">
                    Page <input type="text" value="1" size="1" class="tm-input-paging tm-text-primary"> of 200
                </form>
            </div>
        </div>
        <div class="row tm-mb-90 tm-gallery">
            @foreach($images as $imag)
        	<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="{{asset($imag->image)}}" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>{{$imag->name }}</h2>
                        <a href="/photo-detail/{{$imag->id}}">View more</a>
                    </figcaption>                    
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light">{{$imag->created_at->format('d M Y')}}</span>
                    <span>{{$imag->views}} views</span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row tm-mb-90">
            {{$images->links('pagination')}}
            {{-- <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
                <a href="javascript:void(0);" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
                <div class="tm-paging d-flex">
                    <a href="javascript:void(0);" class="active tm-paging-link">1</a>
                    <a href="javascript:void(0);" class="tm-paging-link">2</a>
                    <a href="javascript:void(0);" class="tm-paging-link">3</a>
                    <a href="javascript:void(0);" class="tm-paging-link">4</a>
                </div>
                <a href="javascript:void(0);" class="btn btn-primary tm-btn-next">Next Page</a>
            </div>             --}}
        </div>
    </div>

@endsection