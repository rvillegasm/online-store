@extends('layouts.master')

@section('content')
<!-- Content -->
<div class="container mt-4">
    <div class="card mb-3">
        <div class="row no-gutters">
          <div class="col-md-2">
            <img class="card-img my-2" src="{{ asset('img/watch1.jpg') }}" alt="">
          </div>
          <div class="col-md-10">
            <div class="card-body">
              <h5 class="card-title col-md-4">Card title</h5>
              <div class="form-group col-md-4">
                <label>{{ __('watch.Quantity') }}</label>
                <input type="number" class="form-control">
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
