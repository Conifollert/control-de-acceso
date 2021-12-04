@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-primary mt-3 mb-3" href={{ route('owners.create')}}>
                Crear propietario
            </a>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Rut</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Tipo vivienda</th>
                    <th scope="col">Numero</th>
                    <th scope="col">Accion</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($owners as $owner)
                    <tr>
                        <th scope="row">{{ $owner->id }}</th>
                        <td>{{ $owner->dni }}</td>
                        <td>{{ $owner->name }}</td>
                        <td>{{ $owner->lastname }}</td>
                        <td>{{ $owner->phone }}</td>
                        <td>{{ $owner->type_livingplace }}</td>
                        <td>{{ $owner->number }}</td>
                        <td>
                            botones
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $owners->links() }}
    </div>
</div>
@endsection
