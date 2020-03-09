@extends('layouts.master')

@section('content')
<!-- Content -->
<div class="container mt-4">
  @include('util.message')
  @if ($data['watches']->count())
    @for($i = 0; $i < count($data['watches']); $i++)
      <div class="card mb-1">
          <div class="row no-gutters">
            <div class="col-md-2">
              <img class="card-img my-2" src="{{ asset('img/watch1.jpg') }}" alt="">
            </div>
            <div class="col-md-10">
              <div class="card-body d-flex justify-content-between lh-condensed row">
                <div class="col-md-5">
                  <h5 class="my-0"><a href="{{ route('watch.show' , ['watchId' => $data['watches'][$i]->getId()]) }}"> {{$data['watches'][$i]->getName()}}</a></h5>
                  <small class="text-muted">{{ $data['watches'][$i]->getDescription() }}</small>
                </div>
                <div class="col-md-2 mt-4">
                  {{ __('watch.TotalUnits') }}: {{ $data['quantity'][$i] }}
                </div>
                <div class="col-md-2 mt-4 pt-1">
                  <strong>${{ $data['watches'][$i]->getPrice() }} {{ __('watch.Unit') }}</strong>
                </div>
                <div class="col-md-2 mt-4">
                  <form action="{{ route('session.delete', ['watchId' => $data['watches'][$i]->getId()]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-block ml-auto">{{ __('customer.Delete') }}</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
    @endfor
    @guest <small>{{ __('customer.Remember login') }}</small> @endguest
    <div class="d-flex">
      <form action="{{ route('cart.checkout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary btn-lg ml-auto">
          {{ __('customer.Continue checkout') }}
        </button>
      </form>
    </div>
  @else
    <div class="alert alert-info" role="alert">
      {{ __('Your cart is empty') }}
    </div>
  @endif
</div>
@endsection
