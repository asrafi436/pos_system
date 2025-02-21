

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<div class="container d-flex justify-content-center align-items-center">
    <h1 class="display-1 text-center">Welcome to Laravel Food App! To See foodt list click on Buy now and click on any food category to find your food</h1>
    <button type="button" class="btn btn-success btn-lg">
        <a href="{{ route('products.index') }}" class="text-white text-decoration-none">Buy Now</a>
    </button>
</div>


