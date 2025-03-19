@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">{{ __('Fichier') }}</h2>

        <div class="space-y-4">
            <p class="text-sm text-gray-700"><span class="font-medium">Nom du fichier :</span> {{ $file->name }}</p>
            <p class="text-sm text-gray-700"><span class="font-medium">Téléversé par :</span> {{ $file->employee->first_name }} {{ $file->employee->last_name }}</p>

            <div class="mt-6">
                <a href="{{ route('files.show', $file) }}" class="inline-block py-2 px-4 bg-indigo-600 text-black font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200 ease-in-out">
                    Télécharger
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
