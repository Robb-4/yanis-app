@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Recherche de marché') }}</div>

                <div class="card-body">

                    <form action="{{ route('search.post') }}" method="post">
                        @csrf
                        <select class="form-select" name="travaux" aria-label="select">
                            <option selected>Type de travaux</option>
                            @foreach ($works as $work)
                                <option value="{{ $work->name }}">{{ ucwords($work->name) }}</option>
                            @endforeach
                        </select>
                        <select class="form-select" name="entreprise" aria-label="select2">
                            <option selected>Entreprise</option>
                            @foreach ($enterprises as $enterprise)
                                <option value="{{ $enterprise->name }}">{{ ucwords($enterprise->name) }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary" type="submit">Rechercher</button>
                    </form>


                    <div class="container my-5">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Entreprise</th>
                                <th scope="col">Numéro marché</th>
                                <th scope="col">Type de travaux</th>

                                <th scope="col">Contact</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($enterprises as $enterprise)
                                <tr>
                                    <th scope="row">{{ $enterprise->id }}</th>
                                    <td>{{ $enterprise->name }}</td>
                                    <td>{{ $enterprise->marche }}</td>
                                    <td>
                                    @for ($i=0;$i<count($enterprise->works);$i++)
                                    {{ $enterprise->works[$i]->name }},
                                    @endfor
                                    </td>
                                    <td><a href="" class="btn btn-primary">GO TO CONTACT</a></td>
                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
