@extends('layout')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Liste des gestionnaires de stagiaires</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gestionnaires as $g)
                    <tr>
                        <td>{{ $g->id }}</td>
                        <td>{{ $g->nom }}</td>
                        <td>{{ $g->prenom }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection