@extends('layouts.layout')
         
@section('content')
<div class="flex-center">
    @if (Route::has('login'))
        <div class="fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div>
        <div class="flex-center">
            <img src="/img/pizza-house.png" alt="pizza house logo" >
        </div>

        <div class="content">
                <div class="title">
                    The Souths Best Pizzas!
                </div> 
                <p class="message">{{ session('mssg') }}</p>
                <a href="{{ route('pizzas.create') }}" >Order a Pizza</a>
        </div>

        
    </div>
</div>
@endsection
  
