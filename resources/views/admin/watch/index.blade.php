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
            <a class="btn btn-primary mt-1" href="{{ route('admin.watch.create') }}" role="button">{{ __('watch.Add Watch') }}</a>
            <a class="btn btn-success mt-1" href="{{ route('admin.watch.export') }}" role="button">{{ __('watch.Generate Excel') }}</a>
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
                    <th scope="col">{{ __('watch.Operations') }}</th>
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
                    <td>
                      <form action="{{ route('admin.watch.delete', ['id' => $watch->getId()]) }}" method="post">
                        <input class="btn btn-danger" type="submit" value="{{ __('watch.Delete') }}" />
                        @method('delete')
                        @csrf
                      </form>
                    </td>
                    <td>
                      <a class="btn btn-info" href="{{ route('admin.watch.edit', ['id' => $watch->getId()]) }}">
                        {{ __('watch.Edit') }}
                      </a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
