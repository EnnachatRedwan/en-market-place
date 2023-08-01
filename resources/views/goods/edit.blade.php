@extends('layout')

@section('content')
    <div class="container">
        <form method="POST" action="/goods/{{ $good->id }}" class="form" enctype="multipart/form-data">
            @csrf
            @method('Put')
            <h1>Edit <span>Good</span></h1>
            <div class="form-fields">
                <div class="form-field">
                    <label for="title">Title: <span>*</span></label>
                    <input type="text" required name="title" id="title" value="{{ $good->title }}">
                    @error('title')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="price">Price: <span>*</span></label>
                    <input type="number" required min="1" max="1000000" name="price" id="price"
                        value="{{ $good->price }}">
                    @error('price')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="seller_email">Seller email :</label>
                    <input type="email" name="seller_email" id="seller_email" value="{{ $good->seller_email }}">
                    @error('seller_email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="seller_phone_number">Seller phone number :</label>
                    <input type="tel" name="seller_phone_number" id="seller_phone_number"
                        value="{{ $good->seller_phone_number }}">
                    @error('seller_phone_number')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="location">Location: <span>*</span></label>
                    <input type="text" required name="location" id="location" value="{{ $good->location }}">
                    @error('location')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="image">Image:</label>
                    <input type="file" accept=".png,.jpg,.jpeg,.webp" name="image" id="image">
                    
                    @if (isset($good->image))
                        <img src="{{ asset('/storage/' . $good->image) }}" />
                    @endif
                    
                    @error('image')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="description">Description: <span>*</span> </label>
                    <textarea name="description" required id="description" cols="30" rows="10">{{ $good->description }}</textarea>
                    @error('Description')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-controlls">
                <button class="btn">Edit</button>
            </div>
        </form>
    </div>
@endsection
