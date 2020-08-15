@extends('app')

@section('title', 'Services Page')

@section('content')
    <h1>Welcome to laravel 6 from services</h1>
    <p>With some additional text</p>

    <form action="/service" method="post">
        <input name="name" type="text"/>
        @csrf
        <button>Add service</button>
    </form>
    <p style="color: red">@error('name') {{ $message }} @enderror </p>
    <ul>
        @forelse($services as $service)
            <li>{{ $service->name }}</li>
        @empty
            <li>No services available</li>
        @endforelse
    </ul>
@endsection
