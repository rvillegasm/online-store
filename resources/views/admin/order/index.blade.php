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
                    <th scope="col">{{ __('watch.Date Shipped') }}</th>
                    <th scope="col">{{ __('watch.Status') }}</th>
                    <th scope="col">{{ __('watch.Items') }}</th>
                    <th scope="col">{{ __('watch.Customer name') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data["orders"] as $order)
                  <tr>
                    <th scope="row">{{ $order->getId() }}</th>
                    <td>{{ $order->getDateShipped() }}</td>
                    <td>{{ $order->getStatus() }}</td>
                    <td>
                        <a href="{{ route('admin.order.index') }}" role="button">{{ __('watch.Items') }}</a>
                    </td>
                    <td>{{ $order->user->getName() }}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
