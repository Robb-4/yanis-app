@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Devis') }}</div>

                <div class="card-body">
                    <p class="card-text">{{ $enterprise->name }}</p>
                    <form action="{{ route('devis.post', ['id' => $enterprise->id]) }}" method="post">
                        @csrf
                        <select class="form-select mb-1" name="travaux" aria-label="select">
                            <option selected>Type de travaux</option>
                            @foreach ($enterprise->works as $work)
                                <option value="{{ $work->name }}">{{ ucwords($work->name) }}</option>
                            @endforeach
                        </select>
                        <select class="form-select mb-1" name="college" aria-label="select2">
                            <option selected>Collège</option>
                            @foreach ($colleges as $college)
                                <option value="{{ $college->name }}">{{ ucwords($college->name) }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary" type="submit">Générer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
