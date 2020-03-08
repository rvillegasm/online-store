@extends('layouts.master')

@section("title", $data["watch"]->getName())

@section('content')

<!-- Content -->
<div class="container mt-4">
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <div class="card px-1">
                    <img class="img-thumbnail my-1" src="{{ asset('img/watch1.jpg') }}" alt="Card Back">
                    <img class="img-thumbnail my-1" src="{{ asset('img/watch2.jpg') }}" alt="Card Front">
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
                    <br />
                    <div class="clearfix"></div>
                    <hr>
                    <!-- Add Comment -->
                    <form class="panel-body" method="POST" action="{{ route('comment.store' , ['watchId' => $data['watch']->getId()]) }}">
                        @csrf
                        <input class="form-control" type="text" name="description" placeholder="{{ __('comment.commentPlaceholder') }}" />
                        <input type="hidden" name="watch_id" value="{{ $data['watch']->getId() }}" />
                        <input type="submit" class="btn btn-dark btn-sm btn-block" value="{{ __('comment.submitComment') }}">
                    </form>
                    <!-- Comments -->
                    <div class="clearfix"></div>
                    </br>
                    <div class="card">
                        <ul class="list-group list-group-flush">
                        @foreach($data["watch"]->comments as $comment)
                            <li class="list-group-item">
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p>{{ $comment->getDescription() }}</p>
                                        <footer class="blockquote-footer"> {{ __('comment.in') }} <cite> {{ $comment->getDate() }} </cite></footer>
                                    </blockquote>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection