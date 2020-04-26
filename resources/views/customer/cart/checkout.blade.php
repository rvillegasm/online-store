@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<!-- Content -->
<div class="bg-light">
<div class="container bg-light">
    <div class="py-5 text-center">
      <h2>{{ __('customer.Checkout form') }}</h2>
    </div>
  
    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">{{ __('home.My cart') }}</span>
          <span class="badge badge-secondary badge-pill">{{ count($data['watches']) }}</span>
        </h4>
        <ul class="list-group mb-3">
          @for($i = 0; $i < count($data["watches"]); $i++)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{ $data["watches"][$i]->getName() }}</h6>
                <small class="text-muted">{{ __('watch.Quantity') }} {{ $data["quantity"][$i] }}</small>
              </div>
              <span class="text-muted">$ {{ $data["watches"][$i]->getPrice() * $data["quantity"][$i] }}</span>
            </li>
          @endfor
          <li class="list-group-item d-flex justify-content-between">
            <span>{{ __('customer.Total') }} (USD)</span>
            <strong>{{ $data['total'] }}</strong>
          </li>
        </ul>
        <a href="{{ route('cart.index') }}" class="btn btn-dark btn-block">{{ __('home.Edit cart') }}</a>
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">{{ __('customer.Customer info') }}</h4>
        <form action="{{ route('cart.process') }}" method="post">
          @csrf
          <div class="mb-3">
            <label>{{ __('customer.Name') }}</label>
            <input type="text" class="form-control" name="name" required>
          </div>

          <div class="mb-3">
            <label>{{ __('customer.Address') }}</label>
            <input type="text" class="form-control" placeholder="1234 Main St" name="adress" required>
          </div>

          <div class="mb-3">
            <label>{{ __('customer.Phone number') }}</label>
            <input type="number" class="form-control" name="phone_number" required>
          </div>

          <div class="mb-3">
            <label>{{ __('customer.Zip') }}</label>
            <input type="number" class="form-control" name="zip" required>
          </div>

          <hr class="mb-4">
  
          <h4 class="mb-3">Payment</h4>
  
          <div class="row">
            <div class="col-md-6 mb-3">
              <label>Name on card</label>
              <input type="text" name="paymentInfo[owner]" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
              <label>Credit card number</label>
              <input type="text" name="paymentInfo[number]" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label>Expiration</label>
              <input type="text" name="paymentInfo[expiration]" class="form-control">
            </div>
            <div class="col-md-3 mb-3">
              <label>CVV</label>
              <input type="text" name="paymentInfo[cvv]" class="form-control" placeholder="">
            </div>
            <div class="col-md-6 mb-3">
              <label>Address</label>
              <input type="text" class="form-control" placeholder="1234 Main St">
            </div>
          </div>
          
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">{{ __('customer.Finalize') }}</button>
        </form>
      </div>
    </div>
  </div>  
@endsection
