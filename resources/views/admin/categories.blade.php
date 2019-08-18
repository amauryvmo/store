@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <p>
            <a href="{{ route('admin.categories.new') }}" class="btn btn-outline-primary float-right">Add</a>
            <div class="clearfix"></div>
        </p>

        <table class="table table-bordered">
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            <a href="{{ route('admin.categories.code', $category->code) }}">{{ $category->name }}</a>
                            ({{ $category->categories->count() }})

                            <a href="{{ route('admin.categories.new', ['parent_code' => $category->code]) }}" class="btn btn-outline-primary float-right">Add</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
