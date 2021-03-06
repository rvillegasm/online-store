@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="justify-content-center">
        <div class="card">
            <div class="card-header">{{ __('watch.Update a Category') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.category.update') }}">
                    @csrf
                    @method('put')

                    <input type="hidden" name="id" id="id" value="{{ $data['category']->getId() }}">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>{{ __('watch.Image') }}</label>
                          <div class="custom-file">
                            <input type="file" id="customFile" class="custom-file-input @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" accept="image/png,image/jpeg" required>
                            <label class="custom-file-label" for="customFile" data-browse="{{ __('watch.Browse') }}">{{ __('watch.Choose file') }}</label>
                          </div>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label>{{ __('watch.Name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data['category']->getName() }}" required>
  
                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>{{ __('watch.Description') }}</label>
                          <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3" required>{{ $data['category']->getDescription() }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">
                                {{ __('watch.Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
