@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<!-- Content -->
<div class="container">
    
    <div class="row">
    @foreach($data["watch"] as $watch)
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="{{ asset('img/watch1.jpg') }}" alt="">
            <div class="card-body">
                <h5 class="card-title"><a href="#"> {{$watch->getName()}} </a> <span class="badge badge-primary"> ${{$watch->getPrice()}} </span></h5>
                <p class="card-text">{{$watch->getDescription()}}</p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-dark">Add to cart</button>
                </div>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
    
</div>
@endsection