@extends('layouts.master')

@section("title", $data["watch"]->getName())

@section('content')

<!-- Content -->
<div class="container">
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <div class="card">
                    <img class="img-thumbnail" src="{{ asset('img/watch1.jpg') }}" alt="Card Back">
                    <img class="img-thumbnail" src="{{ asset('img/watch2.jpg') }}" class="img-top" alt="Card Front">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$data["watch"]->getBrand()}}</h5>
                    <h2>{{$data["watch"]->getName()}} <span class="badge badge-primary">${{$data["watch"]->getPrice()}}</span></h2>
                    <h3><span class="badge badge-light">{{$data["watch"]->getReference()}}</span></h3>
                    <p class="card-text">
                        {{$data["watch"]->getDescription()}}
                        <br><strong>{{ __('watch.ideal') }}: </strong>{{$data["watch"]->getGender()}}</br>
                    </p>
                    <div class="btn-group">
                        <button type="button" class="btn btn-dark">{{ __('watch.Add to cart') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection