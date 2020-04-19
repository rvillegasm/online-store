@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="justify-content-center">
        <div class="card">
            <div class="card-header">{{ __('watch.Create a Watch') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.watch.store') }}" enctype="multipart/form-data">
                    @csrf

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
                                <option disabled selected>Open this select menu</option>
                                @foreach ($data["categories"] as $category)
                                <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                                @endforeach
                            </select>

                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>{{ __('watch.Name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ __('watch.Brand') }}</label>
                            <input type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ old('brand') }}" required>

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
                            <input type="text" class="form-control @error('reference') is-invalid @enderror" name="reference" value="{{ old('reference') }}" required>

                            @error('reference')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ __('watch.Color') }}</label>
                            <input type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ old('color') }}" required>

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
                            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required>

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ __('watch.Quantity') }}</label>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required>

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
                                <option disabled selected>Open this select menu</option>
                                <option value="FEMALE">FEMALE</option>
                                <option value="MALE">MALE</option>
                                <option value="NONE">NONE</option>
                            </select>

                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ __('watch.Description') }}</label>
                            <textarea class="form-control @error('gender') is-invalid @enderror" name="description" value="{{ old('description') }}" rows="3" required></textarea>

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
                                {{ __('watch.Create') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection