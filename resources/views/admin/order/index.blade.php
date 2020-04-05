@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<!-- Content -->
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
          {{ __('watch.Categories') }}
        </div>
        <div class="card-body">
            <table class="table table-responsive-xl mt-2" aria-describedby="categories">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('watch.Date') }}</th>
                    <th scope="col">{{ __('watch.Date Shipped') }}</th>
                    <th scope="col">{{ __('watch.Status') }}</th>
                    <th scope="col">{{ __('watch.Customer name') }}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($data["orders"] as $order)
                  <tr>
                    <th scope="row">{{ $order->getId() }}</th>
                    <td>{{ $order->getCreatedAt() }}</td>
                    <td>{{ $order->getDateShipped() }}</td>
                    <td>{{ __('home.'.$order->getStatus()) }}</td>
                    <td>{{ $order->user->getName() }}</td>
                    <td>
                      <a class="btn btn-info btn-sm" href="{{ route('admin.order.show' , ['orderId' => $order->getId()]) }}" role="button">{{ __('watch.Details') }}</a>
                  </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
