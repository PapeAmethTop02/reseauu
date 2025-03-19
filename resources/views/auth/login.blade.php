@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-md mx-auto bg-white shadow-2xl rounded-3xl p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4">{{ __('Connexion') }}</h2>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-gray-700 font-medium mb-2">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                       class="w-full px-4 py-3 border rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                       required autocomplete="email" autofocus>

                @error('email')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-gray-700 font-medium mb-2">{{ __('Mot de passe') }}</label>
                <input id="password" type="password" name="password"
                       class="w-full px-4 py-3 border rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror"
                       required autocomplete="current-password">

                @error('password')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <input class="mr-2 w-4 h-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="text-gray-700 text-sm" for="remember">
                    {{ __('Se souvenir de moi') }}
                </label>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 text-black px-6 py-3 rounded-full font-semibold hover:bg-blue-700 transition duration-300">
                    {{ __('Connexion') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
