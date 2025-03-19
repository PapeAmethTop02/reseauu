@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white shadow-2xl rounded-3xl p-8">
            <div class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4">
                {{ __('Gestion des employés') }}
            </div>

            <div class="space-y-6">
                <h5 class="text-lg text-gray-700 font-semibold">Liste des employés :</h5>

                <ul class="space-y-4">
                    @foreach ($employees as $employee)
                        <li class="flex items-center justify-between bg-gray-50 p-4 rounded-xl shadow-sm">
                            <div class="text-gray-800">
                                {{ $employee->first_name }} {{ $employee->last_name }} - 
                                <span class="text-gray-600">{{ $employee->email }}</span>
                            </div>

                            @if (!$employee->is_approved)
                                <form action="{{ route('admin.employees.approve', $employee) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-green-600 text-black text-sm font-semibold rounded-full hover:bg-green-700 transition duration-300">
                                        Approuver
                                    </button>
                                </form>
                            @else
                                <span class="text-green-600 font-medium">✔ Approuvé</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
