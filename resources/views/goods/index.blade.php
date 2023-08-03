@extends('layout')

@section('content')
    @include('partials._hero')
    <div id="items" class="container grided">
        @foreach ($goods as $good)
            <a class="good-item" href="/goods/{{ $good->id }}">
                <div class="product-img">
                    <img src="{{ $good->image == null ? asset('/images/no-product.jpg') : asset('/storage/' . $good->image) }}"
                        alt="{{ $good->title }}">
                </div>
                <div class="good-info">

                    <h1>{{ $good->title }}</h1>

                    <p><i class="fa-solid fa-location-dot"></i> {{ $good->location }}</p>
                    <span class="price">{{ $good->price }}$</span>
                </div>
            </a>
        @endforeach
    </div>
    <div class="container pagination-container">
        {{ $goods->links() }}
    </div>
    <div class="add-good">
        <p>&copy; Copyright 2023</p>
        <a href="/goods/create">Post a Good</a>
    </div>
@endsection
