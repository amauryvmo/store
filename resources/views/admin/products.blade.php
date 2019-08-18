@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <p>
            <a href="{{ route('admin.products.new') }}" class="btn btn-outline-primary float-right">Add</a>
        <div class="clearfix"></div>
        </p>

        <table class="table table-bordered">
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>
                        {{ $product->name }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
