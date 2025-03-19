@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">{{ __('Fichiers partagés') }}</h2>

        <form method="POST" action="{{ route('files.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label for="file" class="block text-sm font-medium text-gray-700">Téléverser un fichier :</label>
                <input type="file" name="file" id="file" class="mt-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Téléverser</button>
        </form>

        <hr class="my-8 border-t border-gray-200">

        <h5 class="text-lg font-medium text-gray-800">Liste des fichiers :</h5>
        <ul class="space-y-4">
            @foreach ($files as $file)
                <li>
                    <a href="{{ route('files.show', $file) }}" class="text-indigo-600 hover:text-indigo-800 transition duration-200 ease-in-out">
                        <i class="fas fa-file-alt mr-2"></i> {{ $file->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
