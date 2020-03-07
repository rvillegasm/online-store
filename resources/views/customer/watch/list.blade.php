@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<!-- Content -->
<div class="container">

    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" value="">{{ __('watch.orderBy') }}</button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('watch.list' , ['categoryName' => $data['watchesCategory'], 'filter' => 'all']) }}">{{ __('watch.relevance') }}</a></li>
            <li><a href="{{ route('watch.list' , ['categoryName' => $data['watchesCategory'], 'filter' => 'name']) }}">{{ __('watch.byName') }}</a></li>
            <li><a href="{{ route('watch.list' , ['categoryName' => $data['watchesCategory'], 'filter' => 'priceAsc']) }}">{{ __('watch.PriceAsc') }}</a></li>
            <li><a href="{{ route('watch.list' , ['categoryName' => $data['watchesCategory'], 'filter' => 'priceDesc']) }}">{{ __('watch.PriceDesc') }}</a></li>
        </ul>
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
                            <button type="button" class="btn btn-dark">{{ __('watch.Add to cart') }}</button>
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