@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        {{ $category->name }} - Sub Categorias
                        <a href="{{ route('admin.categories.new', ['parent_code' => $category->code]) }}" class="btn btn-outline-primary float-right">Add</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
