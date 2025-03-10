@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Gestion des employés') }}</div>

                <div class="card-body">
                    <h5>Liste des employés :</h5>
                    <ul>
                        @foreach ($employees as $employee)
                            <li>
                                {{ $employee->first_name }} {{ $employee->last_name }} - {{ $employee->email }}
                                @if (!$employee->is_approved)
                                    <form action="{{ route('admin.employees.approve', $employee) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Approuver</button>
                                    </form>
                                @else
                                    <span class="text-success">Approuvé</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection