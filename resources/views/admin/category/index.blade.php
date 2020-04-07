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
            <a class="btn btn-primary" href="{{ route('admin.category.create') }}" role="button">{{ __('watch.Add Category') }}</a>
            <table class="table table-responsive-xl mt-2" aria-describedby="categories">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('watch.Name') }}</th>
                    <th scope="col">{{ __('watch.Description') }}</th>
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
