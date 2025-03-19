@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-lg mx-auto bg-white shadow-2xl rounded-3xl p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4">{{ __('Inscription') }}</h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <div>
                <label for="first_name" class="block text-gray-700 font-medium mb-2">{{ __('Prénom') }}</label>
                <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}"
                       class="w-full px-4 py-3 border rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('first_name') border-red-500 @enderror"
                       required autocomplete="first_name" autofocus>

                @error('first_name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="last_name" class="block text-gray-700 font-medium mb-2">{{ __('Nom') }}</label>
                <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}"
                       class="w-full px-4 py-3 border rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('last_name') border-red-500 @enderror"
                       required autocomplete="last_name">

                @error('last_name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-medium mb-2">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                       class="w-full px-4 py-3 border rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                       required autocomplete="email">

                @error('email')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-gray-700 font-medium mb-2">{{ __('Mot de passe') }}</label>
                <input id="password" type="password" name="password"
                       class="w-full px-4 py-3 border rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror"
                       required autocomplete="new-password">

                @error('password')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password-confirm" class="block text-gray-700 font-medium mb-2">{{ __('Confirmer le mot de passe') }}</label>
                <input id="password-confirm" type="password" name="password_confirmation"
                       class="w-full px-4 py-3 border rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required autocomplete="new-password">
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 text-black px-8 py-3 rounded-full font-semibold hover:bg-blue-700 transition duration-300">
                    {{ __('S\'inscrire') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
