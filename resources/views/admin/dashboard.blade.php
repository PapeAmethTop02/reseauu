@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tableau de bord administrateur') }}</div>

                <div class="card-body">
                    <h4>Bienvenue, administrateur !</h4>
                    <a href="{{ route('admin.employees') }}" class="btn btn-primary">Gérer les employés</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection