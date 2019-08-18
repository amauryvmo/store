@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5>New Category</h5>

                <form method="post" action="{{ route('admin.categories.create') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label {{ $errors->has('parent_id') ? 'text-danger' : '' }}">Category</label>
                        <div class="col-sm-5">
                            <select class="form-control {{ $errors->has('parent_id') ? 'is-invalid' : '' }}" id="parentId" name="parent_id">
                                <option value=""> --- </option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label {{ $errors->has('code') ? 'text-danger' : '' }}">Code</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" id="code" name="code" value="{{ old('code') }}">
                        </div>
                        <div class="col-sm-5">
                            @if ($errors->has('code'))
                                <small class="text-danger">
                                    {{ $errors->first('code') }}
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

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
