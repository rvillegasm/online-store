@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<!-- Content -->
<div class="container mt-4">

    <blockquote class="text-center">
        <h1 class="display-4">{{$data["watchesCategory"]}} {{ __('watch.Category') }} </h1>
    </blockquote>

    <div class="dropdown mb-2">
        <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" value="">{{ __('watch.orderBy') }}</button>
        <div class="dropdown-menu" role="menu">
            <a class="dropdown-item" href="{{ route('watch.list' , ['categoryName' => $data['watchesCategory'], 'filter' => 'all']) }}">{{ __('watch.relevance') }}</a>
            <a class="dropdown-item" href="{{ route('watch.list' , ['categoryName' => $data['watchesCategory'], 'filter' => 'name']) }}">{{ __('watch.byName') }}</a>
            <a class="dropdown-item" href="{{ route('watch.list' , ['categoryName' => $data['watchesCategory'], 'filter' => 'priceAsc']) }}">{{ __('watch.PriceAsc') }}</a>
            <a class="dropdown-item" href="{{ route('watch.list' , ['categoryName' => $data['watchesCategory'], 'filter' => 'priceDesc']) }}">{{ __('watch.PriceDesc') }}</a>
        </div>
    </div>

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
                            <form action="{{ route('session.put', ['watchId' => $watch->getId()]) }}" method="POST">
                                @csrf
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm">
                                            Quantity:<input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" max="{{ $watch->getQuantity() }}">
                                        </div>
                                        <div class="col-sm">
                                            <button type="submit" class="btn btn-dark">{{ __('watch.Add to cart') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $data["watches"]->links() }}
</div>
@endsection