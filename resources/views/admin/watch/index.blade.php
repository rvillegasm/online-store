@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<!-- Content -->
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            {{ __('watch.Watches') }}
        </div>
        <div class="card-body">
            <a class="btn btn-primary" href="{{ route('admin.watch.create') }}" role="button">{{ __('watch.Add Watch') }}</a>
            <table class="table table-responsive-xl mt-2" aria-describedby="watches">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('watch.Name') }}</th>
                    <th scope="col">{{ __('watch.Brand') }}</th>
                    <th scope="col">{{ __('watch.Reference') }}</th>
                    <th scope="col">{{ __('watch.Color') }}</th>
                    <th scope="col">{{ __('watch.Category') }}</th>
                    <th scope="col">{{ __('watch.Price') }}</th>
                    <th scope="col">{{ __('watch.Quantity') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data["watches"] as $watch)
                  <tr>
                    <th scope="row">{{ $watch->getId() }}</th>
                    <td>{{ $watch->getName() }}</td>
                    <td>{{ $watch->getBrand() }}</td>
                    <td>{{ $watch->getReference() }}</td>
                    <td>{{ $watch->getColor() }}</td>
                    <td>{{ $watch->category->getName() }}</td>
                    <td><span class="badge badge-primary">{{ $watch->getPrice() }}</span></td>
                    <td>{{ $watch->getQuantity() }}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
