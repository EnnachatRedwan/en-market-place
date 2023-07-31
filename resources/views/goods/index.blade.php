@extends('layout')

@section('content')
@include('partials._hero')
    <div id="items" class="container grided">
        @foreach ($goods as $good)
            <div class="good-item">
                <div class="product-img">
                    <img src="/images/no-product.png" alt="{{ $good->title }}">
                </div>
                <div class="good-info">
                    <a href="/goods/{{ $good->id }}">
                        <h1>{{ $good->title }}</h1>
                    </a>
                    <p><i class="fa-solid fa-location-dot"></i> {{ $good->location }}</p>
                    <span class="price">{{ $good->price }}$</span>
                </div>
            </div>
        @endforeach
    </div>
    <div class="container">
        {{$goods->links()}}
    </div>
@endsection
