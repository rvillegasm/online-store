@extends('layouts.master')

@section('content')
<!-- Content -->
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            Watches
        </div>
        <div class="card-body">
            <a class="btn btn-primary" href="#" role="button">Add Watch</a>
            <table class="table mt-2">
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
                  <tr>
                    <th scope="row">1</th>
                    <td>Apple Watch Series 3</td>
                    <td>Apple</td>
                    <td>AppleWS3</td>
                    <td>Black</td>
                    <td>Smart</td>
                    <td><span class="badge badge-primary">$7.03</span></td>
                    <td>100</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
