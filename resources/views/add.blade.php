@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ajout BDD') }}</div>

                <div class="card-body">
                    <p class="card-text"><strong>Ajout Collège:</strong> <a href="#" class="btn btn-primary"><strong>Collège</strong></a></p>
                    <p class="card-text"><strong>Ajout Entreprise:</strong> <a href="#" class="btn btn-primary"><strong>Entreprise</strong></a></p>
                    <p class="card-text"><strong>Ajout Travaux:</strong> <a href="#" class="btn btn-primary"><strong>Travaux</strong></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
