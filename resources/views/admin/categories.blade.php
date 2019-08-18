@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <table class="table table-bordered">
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td><a href="{{ route('admin.categories.code', $category->code) }}">{{ $category->name }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
