@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white shadow-2xl rounded-3xl p-8">
            <div class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4">
                {{ __('Tableau de bord administrateur') }}
            </div>

            <div class="space-y-6">
                <h4 class="text-xl text-gray-700 font-semibold">Bienvenue, administrateur !</h4>

                <a href="{{ route('admin.employees') }}"
                   class="inline-block px-6 py-3 bg-indigo-600 text-black font-semibold rounded-full shadow hover:bg-indigo-700 transition duration-300">
                    Gérer les employés
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
