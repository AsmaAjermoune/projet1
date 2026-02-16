@extends('layout')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Liste des modules</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Masse</th>
                </tr>
            </thead>
            <tbody>
                @foreach($modules as $m)
                    <tr>
                        <td>{{ $m->id }}</td>
                        <td>{{ $m->nom }}</td>
                        <td>{{ $m->masse }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection