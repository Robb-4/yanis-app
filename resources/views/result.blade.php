@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Demande de devis') }}</div>

                <div class="card-body">
                    <p class="card-text">
                        Bonjour, <br>

                        Dans le cadre de votre marché à bon de commande n° {{ $enterprise->marches[0]->numero }}, j'aimerais vous mandaté pour une visite pour devis au collège {{ $college->name }}, {{ $college->adresse }} à {{ $college->ville }}. <br>

                        Concernant : <br>

                        [TEXTE A RAJOUTER / ZONE DE TEXTE DESCRIPTIF ] <br>

                        Merci de me proposer une date de visite possible et de me tenir informer. <br>

                        Je reste disponible pour tout complément d'information, <br>

                        Cordialement
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
