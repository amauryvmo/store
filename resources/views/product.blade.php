@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <div class="card">
                    <img src="https://i0.wp.com/marketingcomcafe.com.br/wp-content/uploads/2017/12/banco-imagens-gratis.png?zoom=2&resize=720%2C445&ssl=1" class="card-img-top" alt="...">
                </div>
            </div>
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <p class="card-text">Product description.</p>

                        <form action="#">
                            <button class="btn">Add to Cart</button>
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
