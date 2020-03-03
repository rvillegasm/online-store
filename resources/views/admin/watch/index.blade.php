@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<!-- Content -->
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            Watches
        </div>
        <div class="card-body">
            <a class="btn btn-primary" href="#" role="button">Add Watch</a>
            <table class="table table-responsive-xl mt-2">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Reference</th>
                    <th scope="col">Color</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
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
