@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<!-- Content -->
<div class="bg-light">
<div class="container bg-light">
    <div class="py-5 text-center">
      <h2>Checkout form</h2>
    </div>
  
    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span class="badge badge-secondary badge-pill">0</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Product name</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$12</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Second product</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$8</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$20</strong>
          </li>
        </ul>
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Billing address</h4>
        <form>
            <div class="mb-3">
              <label>Name</label>
              <input type="text" class="form-control" required>
            </div>
  
          <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="you@example.com" required>
          </div>
  
          <div class="mb-3">
            <label>Address</label>
            <input type="text" class="form-control" placeholder="1234 Main St" required>
          </div>

          <div class="mb-3">
            <label>Phone Number</label>
            <input type="text" class="form-control" placeholder="1234 Main St" required>
          </div>

          <div class="mb-3">
            <label>Zip</label>
            <input type="text" class="form-control" required>
          </div>

          <hr class="mb-4">
  
          <h4 class="mb-3">Payment</h4>
  
          <div class="row">
            <div class="col-md-6 mb-3">
              <label>Name on card</label>
              <input type="text" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Credit card number</label>
              <input type="text" class="form-control" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label>Expiration</label>
              <input type="text" class="form-control" required>
            </div>
            <div class="col-md-3 mb-3">
              <label>CVV</label>
              <input type="text" class="form-control" placeholder="" required>
            </div>
          </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>
  </div>  
@endsection
