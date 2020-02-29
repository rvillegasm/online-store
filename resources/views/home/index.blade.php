@extends('layouts.master')

@section('content')
<!-- Banner -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="{{ asset('img/banner1.jpg') }}" class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
        <img src="{{ asset('img/banner2.jpg') }}" class="d-block w-100" alt="">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Content -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="{{ asset('img/watch1.jpg') }}" alt="">
            <div class="card-body">
                <h5 class="card-title">Smart Watch <span class="badge badge-primary">$7.03</span></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-dark">Add to cart</button>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-dark text-light py-4 justify-content-center ">

</div>
@endsection
