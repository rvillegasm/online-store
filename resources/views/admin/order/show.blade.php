@extends('layouts.master')

@section('content')
<!-- Content -->
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8 order-lg-2 mb-4">
            @foreach($data['order']->items as $item)
            @php $watch = $item->watch @endphp
                <div class="card mb-1">
                    <div class="row no-gutters">
                    <div class="col-md-2">
                        <img class="card-img my-2" src="{{ asset('img/watch1.jpg') }}" alt="">
                    </div>
                    <div class="col-md-10">
                        <div class="card-body d-flex justify-content-between lh-condensed row">
                        <div class="col-md-5">
                            <h5 class="my-0"><a href="{{ route('watch.show' , ['watchId' => $watch->getId()]) }}"> {{$watch->getName()}}</a></h5>
                            <small class="text-muted">{{ $watch->getDescription() }}</small>
                        </div>
                        <div class="col-md-2 mt-4">
                            {{ __('watch.TotalUnits') }}: {{ $item->getProductQuantity() }}
                        </div>
                        <div class="col-md-2 mt-4 pt-1">
                            <strong>${{ $item->getSubTotal() }}</strong>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-lg-4 order-lg-1">
            <div class="card">
                <div class="card-body">
                    @php $customer = $data['order']->customerDetails @endphp
                    <div class="mb-3">
                        <strong><label>{{ __('customer.Name') }}</label></strong>
                        <p>{{ $customer->getName() }}</p>
                    </div>
            
                    <div class="mb-3">
                        <strong><label>{{ __('customer.Address') }}</label></strong>
                        <p>{{ $customer->getAdress() }}</p>
                    </div>
            
                    <div class="mb-3">
                        <strong><label>{{ __('customer.Phone number') }}</label></strong>
                        <p>{{ $customer->getPhoneNumber() }}</p>
                    </div>
            
                    <div class="mb-3">
                        <strong><label>{{ __('customer.Zip') }}</label></strong>
                        <p>{{ $customer->getZip() }}</p>
                    </div>
                    <hr>
                    <p>{{ $data['order']->user->getName() }}</p>
                    <p>{{ $data['order']->user->getEmail() }}</p>
                    <hr>
                    <form method="POST" action="{{ route('admin.order.update', $data['order']->getId()) }}">
                        @csrf
    
                        <div class="form-row">
                            <div class="form-group col">
                              <label>{{ __('watch.Status') }}</label>
                              <select class="custom-select" name="status" required>
                              <option selected value="{{ $data['order']->getStatus() }}">{{ __('home.'.$data['order']->getStatus()) }}</option>
                              <option value="PENDING">{{ __('home.PENDING') }}</option>
                              <option value="SHIPPED">{{ __('home.SHIPPED') }}</option>
                              <option value="DELIVERED">{{ __('home.DELIVERED') }}</option>
                              
                              </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                              <label>{{ __('watch.Date Shipped') }}</label>
                              <input type="date" class="form-control @error('price') is-invalid @enderror" name="date_shipped" value="{{ $data['order']->getDateShipped() }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">
                                    {{ __('home.Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
