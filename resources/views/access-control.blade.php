@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-primary mt-3 mb-3" href={{ route('owners.create')}}>
                Buscar
            </a>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Rut</th>
                    <th>Numero Vivienda</th>
                    <th>Estado</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($accesses as $access)
                    <tr>
                        <td>{{$access-control->id }}</td>
                        <td>{{$access-control->name }}</td>
                        <td>{{$access-control->lastname }}</td>
                        <td>{{$access-control->dni }}</td>
                        <td>{{$access-control->number_livingplace }}</td>
                        <td>{{$access-control->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $accesses->links() }}
    </div>
</div>
@endsection
