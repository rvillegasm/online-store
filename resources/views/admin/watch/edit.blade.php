@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="justify-content-center">
        <div class="card">
            <div class="card-header">{{ __('watch.Update a Watch') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.watch.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" value="{{ $data['watch']->getId() }}">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>{{ __('watch.Image') }}</label>
                            <div class="custom-file">
                            <input type="file" id="customFile" class="custom-file-input @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" accept="image/*">
                            <label class="custom-file-label" for="customFile" data-browse="{{ __('watch.Browse') }}">{{ __('watch.Choose file') }}</label>
                            </div>

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label>{{ __('watch.Category') }}</label>
                          <select class="custom-select" name="category_id" required>
                            @foreach ($data["categories"] as $category)
                                <option value="{{ $category->getId() }}">{{ $category->getName() }}</option> 
                            @endforeach
                          </select>

                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>{{ __('watch.Name') }}</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data['watch']->getName() }}" required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label>{{ __('watch.Brand') }}</label>
                          <input type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ $data['watch']->getBrand() }}" required>

                            @error('brand')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>{{ __('watch.Reference') }}</label>
                          <input type="text" class="form-control @error('reference') is-invalid @enderror" name="reference" value="{{ $data['watch']->getReference() }}" required>

                            @error('reference')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label>{{ __('watch.Color') }}</label>
                          <input type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ $data['watch']->getcolor() }}" required>

                            @error('color')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>{{ __('watch.Price') }}</label>
                          <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $data['watch']->getPrice() }}" required>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label>{{ __('watch.Quantity') }}</label>
                          <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $data['watch']->getQuantity() }}" required>

                            @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>{{ __('watch.Gender') }}</label>
                          <select class="custom-select" name="gender" required>
                            <option value="{{ $data['watch']->getGender() }}" selected>{{ __('watch.'.$data['watch']->getGender()) }}</option>
                            <option value="FEMALE">{{ __('watch.FEMALE') }}</option>
                            <option value="MALE">{{ __('watch.MALE') }}</option>
                            <option value="NONE">{{ __('watch.NONE') }}</option>
                          </select>

                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label>{{ __('watch.Description') }}</label>
                          <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3" required>{{ $data['watch']->getDescription() }}</textarea>

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
