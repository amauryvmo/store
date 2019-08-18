@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5>New Product</h5>

                <form method="post" action="{{ route('admin.products.create') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="type" class="col-sm-2 col-form-label {{ $errors->has('type') ? 'text-danger' : '' }}">Type</label>
                        <div class="col-sm-5">
                            <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" id="type" name="type">
                                <option value=""> --- </option>
                                <option value="{{ \App\Product::TYPE_SIMPLE }}" {{ old('type') == \App\Product::TYPE_SIMPLE ? 'selected' : '' }}>Simple</option>
                                <option value="{{ \App\Product::TYPE_BUNDLE }}" {{ old('type') == \App\Product::TYPE_BUNDLE ? 'selected' : '' }}>Bundle</option>
                            </select>
                        </div>
                        <div class="col-sm-5">
                            @if ($errors->has('type'))
                                <small class="text-danger">
                                    {{ $errors->first('type') }}
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sku" class="col-sm-2 col-form-label {{ $errors->has('sku') ? 'text-danger' : '' }}">SKU</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control {{ $errors->has('sku') ? 'is-invalid' : '' }}" id="sku" name="sku" value="{{ old('sku') }}">
                        </div>
                        <div class="col-sm-5">
                            @if ($errors->has('sku'))
                                <small class="text-danger">
                                    {{ $errors->first('sku') }}
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label {{ $errors->has('name') ? 'text-danger' : '' }}">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="col-sm-5">
                            @if ($errors->has('name'))
                                <small class="text-danger">
                                    {{ $errors->first('name') }}
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="shortDescription" class="col-sm-2 col-form-label {{ $errors->has('short_description') ? 'text-danger' : '' }}">Short Description</label>
                        <div class="col-sm-5">
                            <textarea class="form-control {{ $errors->has('short_description') ? 'is-invalid' : '' }}" id="shortDescription">
                                {{ old('short_description') }}
                            </textarea>
                        </div>
                        <div class="col-sm-5">
                            @if ($errors->has('short_description'))
                                <small class="text-danger">
                                    {{ $errors->first('short_description') }}
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label {{ $errors->has('description') ? 'text-danger' : '' }}">Description</label>
                        <div class="col-sm-5">
                            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description">
                                {{ old('description') }}
                            </textarea>
                        </div>
                        <div class="col-sm-5">
                            @if ($errors->has('description'))
                                <small class="text-danger">
                                    {{ $errors->first('description') }}
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label {{ $errors->has('price') ? 'text-danger' : '' }}">Price</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price" name="price" value="{{ old('price') }}">
                        </div>
                        <div class="col-sm-5">
                            @if ($errors->has('price'))
                                <small class="text-danger">
                                    {{ $errors->first('price') }}
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="showOnly" class="col-sm-2 col-form-label {{ $errors->has('show_only') ? 'text-danger' : '' }}">Show Only</label>
                        <div class="col-sm-5">
                            <select class="form-control {{ $errors->has('show_only') ? 'is-invalid' : '' }}" id="showOnly" name="show_only">
                                <option value=""> --- </option>
                                <option value="1" {{ old('show_only') == '1' ? 'selected' : '' }}>Sim</option>
                                <option value="0" {{ old('show_only') == '0' ? 'selected' : '' }}>Não</option>
                            </select>
                        </div>
                        <div class="col-sm-5">
                            @if ($errors->has('show_only'))
                                <small class="text-danger">
                                    {{ $errors->first('show_only') }}
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="active" class="col-sm-2 col-form-label {{ $errors->has('active') ? 'text-danger' : '' }}">Show Only</label>
                        <div class="col-sm-5">
                            <select class="form-control {{ $errors->has('active') ? 'is-invalid' : '' }}" id="active" name="active">
                                <option value="0" {{ old('active') == '0' ? 'selected' : '' }} selected>Não</option>
                                <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>Sim</option>
                            </select>
                        </div>
                        <div class="col-sm-5">
                            @if ($errors->has('active'))
                                <small class="text-danger">
                                    {{ $errors->first('active') }}
                                </small>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
