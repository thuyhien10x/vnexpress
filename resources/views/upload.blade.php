@if(session('image'))
    <img src="{{ asset('storage/' . session('image')) }}" alt="Uploaded Image">
@endif
