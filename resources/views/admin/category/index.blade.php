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
            <a class="btn btn-primary mb-2" href="{{ route('admin.category.create') }}" role="button">{{ __('watch.Add Category') }}</a>
            <div class="table-responsive">
              <table class="table" aria-describedby="categories">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">{{ __('watch.Name') }}</th>
                      <th scope="col">{{ __('watch.Description') }}</th>
                      <th scope="col" colspan="2">{{ __('watch.Operations') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($data["categories"] as $category)
                    <tr>
                      <th scope="row">{{ $category->getId() }}</th>
                      <td>{{ $category->getName() }}</td>
                      <td><p>{{ $category->getDescription() }}</p></td>
                      <td>
                        <a class="btn btn-info btn-sm" href="{{ route('admin.category.edit', ['id' => $category->getId()]) }}">
                          {{ __('watch.Edit') }}
                        </a>
                      </td>
                      <td>
                        <form action="{{ route('admin.category.delete', ['id' => $category->getId()]) }}" method="post">
                          <input class="btn btn-danger btn-sm" type="submit" value="{{ __('watch.Delete') }}" />
                          @method('delete')
                          @csrf
                        </form>
                      </td>    
                    </tr>
                  @endforeach
                  </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection
