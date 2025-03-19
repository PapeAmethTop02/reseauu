@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ __('Tableau de bord') }}</h2>

        <div class="space-y-6">
            @if (session('status'))
                <div class="bg-green-100 text-green-800 border border-green-300 rounded-md p-4">
                    {{ session('status') }}
                </div>
            @endif

            <h4 class="text-lg font-medium text-gray-700">Bienvenue, <span class="font-semibold">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span> !</h4>

            <div class="mt-6">
                <h5 class="text-lg font-medium text-gray-800">Vos fichiers :</h5>
                <ul class="space-y-4">
                    @foreach ($files as $file)
                        <li>
                            <a href="{{ route('files.show', $file) }}" class="text-indigo-600 hover:text-indigo-800 transition duration-200 ease-in-out">
                                {{ $file->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="mt-6">
                <a href="{{ route('files.index') }}" class="inline-block py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200 ease-in-out">
                    Voir tous les fichiers
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
