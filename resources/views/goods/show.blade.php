@extends('layout')

@section('content')
    <div class="container">
        <div class="good-show">
            <div class="good-show-image">
                <img src="{{ asset('/images/no-product.png') }}" alt="">
            </div>
            <div class="good-show-content">
                <div class="good-show-content-info">
                    <h1>{{ $good->title }}</h1>
                    <p>{{ $good->description }}</p>
                    <p><i class="fa-solid fa-location-dot"></i> {{ $good->location }}</p>
                    @if (isset($good->seller_phone_number))
                        <p><i class="fa-solid fa-phone"></i> {{ $good->seller_phone_number }}</p>
                    @endif
                    @if (isset($good->seller_email))
                        <a href="mailto:red@dd.com"><i class="fa-solid fa-envelope"></i> {{ $good->seller_email }}</a>
                    @endif
                    <p class="price">{{ $good->price }}$</p>
                </div>
                <div class="good-show-content-controlls">
                    <a href="/">Edit</a>
                    <a href="/">delete</a>
                </div>
            </div>

        </div>
    </div>
@endsection
