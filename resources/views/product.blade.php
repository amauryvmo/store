@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <div class="card">
                    <img src="{{ $product->image }}" class="card-img-top">
                </div>
            </div>
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>

                        <form action="#">
                            <button class="btn btn-primary">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/product.js') }}"></script>
@endpush
