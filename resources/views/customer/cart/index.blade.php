@extends('layouts.master')

@section('content')
<!-- Content -->
<div class="container mt-4">
    <div class="card mb-1">
        <div class="row no-gutters">
          <div class="col-md-2">
            <img class="card-img my-2" src="{{ asset('img/watch1.jpg') }}" alt="">
          </div>
          <div class="col-md-10">
            <div class="card-body d-flex justify-content-between lh-condensed row">
              <div class="col-md-5">
                <h5 class="my-0">Product name</h5>
                <small class="text-muted">Brief description</small>
              </div>
              <div class="col-md-2 mt-4">
                <input type="number" class="form-control" value="1" min="1">
              </div>
              <div class="col-md-2 mt-4 pt-1">
                <b>$12</b>
              </div>
              <div class="col-md-2 mt-4">
                <a href="" class="btn btn-danger btn-block ml-auto">{{ __('customer.Delete') }}</a>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="d-flex">
    <a href="{{ route('cart.checkout') }}" class="btn btn-primary btn-lg ml-auto">{{ __('customer.Continue checkout') }}</a>
    </div>
</div>
@endsection
