@extends('layout')

@section('content')
    <div class="container">
        <div class="good-show">
            <div class="good-show-image">
                <figure class="zoom" onmousemove="zoom(event)"
                    style="background-image: url({{ $good->image == null ? asset('/images/no-product.jpg') : asset('/storage/' . $good->image) }})">
                    <img src="{{ $good->image == null ? asset('/images/no-product.jpg') : asset('/storage/' . $good->image) }}"
                        alt="{{ $good->title }}">
                </figure>
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
                    <a href="/goods/{{ $good->id }}/edit">Edit</a>
                    <form method="POST" action="/goods/{{ $good->id }}">
                        @csrf
                        @method('delete')
                        <button>delete</button>
                    </form>
                </div>
            </div>
            <script>
                function zoom(e) {
                    var zoomer = e.currentTarget;
                    e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
                    e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
                    x = offsetX / zoomer.offsetWidth * 100
                    y = offsetY / zoomer.offsetHeight * 100
                    zoomer.style.backgroundPosition = x + '% ' + y + '%';
                }
            </script>
        </div>
    </div>
@endsection
