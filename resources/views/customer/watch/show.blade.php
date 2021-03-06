@extends('layouts.master')

@section("title", $data["watch"]->getName())

@section('content')

<!-- Content -->
<div class="container mt-4">
    <div class="row no-gutters">
        <div class="col-md-4">
            <div class="card px-1">
                <img class="img-thumbnail my-1" src="{{ $data["watch"]->getImage() }}" alt="">
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{$data["watch"]->getBrand()}}</h5>
                <h2>{{$data["watch"]->getName()}} <span class="badge badge-primary">${{$data["watch"]->getPrice()}}</span></h2>
                <h3><span class="badge badge-light">{{$data["watch"]->getReference()}}</span></h3>
                <div class="card border-0">
                    {{$data["watch"]->getDescription()}}
                    <p><strong>{{ __('watch.ideal') }}: </strong>{{$data["watch"]->getGender()}}</p>
                </div>
                <form class="container" action="{{ route('session.put', ['watchId' => $data['watch']->getId()]) }}"method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-2 px-1 mt-1">
                            <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" max="{{  $data['watch']->getQuantity() }}">
                        </div>
                        <div class="col-lg-2 px-0 mt-1">
                            <button type="submit" class="btn btn-dark btn-block">{{ __('watch.Add to cart') }}</button>
                        </div>
                    </div>
                </form>

                <!-- Add Comment -->
                @if(Auth::check())
                    <form class="mt-4" method="POST" action="{{ route('comment.store' , ['watchId' => $data['watch']->getId()]) }}">
                        @csrf
                        <input class="form-control" type="text" name="description" placeholder="{{ __('comment.commentPlaceholder') }}" />
                        <input type="hidden" name="watch_id" value="{{ $data['watch']->getId() }}" />
                        <input type="submit" class="btn btn-dark btn-sm btn-block mt-1" value="{{ __('comment.submitComment') }}">
                    </form>
                @else
                    <p class="mt-2">{{ __('home.logincomment') }}</p>
                @endif

                <!-- Comments -->
                <div class="card mt-2">
                    <ul class="list-group list-group-flush">
                    @foreach($data["watch"]->comments as $comment)
                        <li class="list-group-item">
                            <blockquote class="mb-0">
                                <p>{{ $comment->getDescription() }}</p>
                                <footer> {{ __('comment.in') }} <cite> {{ $comment->getDate() }} </cite></footer>
                            </blockquote>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection