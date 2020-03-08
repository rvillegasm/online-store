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
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
</div>

<!-- Content -->
<div class="container mt-4">
    <!-- Categories -->
    <h4 class="text-center my-4">{{ __('watch.Categories') }}</h4>
    <div class="row row-cols-2 row-cols-md-5 justify-content-center categories">
        @foreach($data["categories"] as $category)
          <div class="col mb-4">
            <div class="card">
              <img class="card-img-top" src="{{ asset('img/watch1.jpg') }}" alt="">
              <div class="card-body">
                <h5 class="card-title text-center">
                  <a href="{{ route('watch.list', ['categoryName' => $category->getName(), 'filter' => 'all']) }}">{{ $category->getName() }}</a>
                </h5>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    <!-- Bestsellers -->
    <h4 class="text-center my-4">{{ __('home.Bestsellers') }}</h4>
    <div class="row">
      @foreach($data["watches"] as $watch)
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="{{ asset('img/watch1.jpg') }}" alt="">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('watch.show' , ['watchId' => $watch->getId()]) }}"> {{$watch->getName()}} </a> <span class="badge badge-primary"> ${{$watch->getPrice()}} </span></h5>
                    <p class="card-text">{{$watch->getDescription()}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-dark">{{ __('watch.Add to cart') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      @endforeach
    </div>
</div>
@endsection
