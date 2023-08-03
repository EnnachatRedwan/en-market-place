@if (session('message')!=null)
    <div class="flash-message">
        <p>{{ session('message') }}</p>
    </div>
@endif

@if (session('error')!=null)
    <div class="flash-message error">
        <p>{{ session('error') }}</p>
    </div>
@endif