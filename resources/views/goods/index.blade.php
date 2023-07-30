@extends('layout')

@section('content')
    <div class="container">
        @foreach ($goods as $good)
            <div class="good-item">
                <div class="product-img">
                    <img src="/images/no-product.png" alt="">
                </div>
                <div class="good-info">
                    <h1>{{ $good->title }}</h1>
                    <p>{{ $good->location }}</p>
                    <span>{{ $good->price }}$</span>
                </div>

            </div>
        @endforeach
    </div>
@endsection
