@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<!-- Content -->
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            Categories
        </div>
        <div class="card-body">
            <a class="btn btn-primary" href="#" role="button">Add Category</a>
            <table class="table table-responsive-xl mt-2" aria-describedby="categories">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data["categories"] as $category)
                  <tr>
                    <th scope="row">{{ $category->getId() }}</th>
                    <td>{{ $category->getName() }}</td>
                    <td>{{ $category->getDescription() }}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
