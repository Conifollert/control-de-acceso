@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro de propietarios</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        {{-- Rut --}}
                        <div class="form-group row">
                            <label for="dni" class="col-md-4 col-form-label text-md-right">Rut</label>

                            <div class="col-md-6">
                                <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" required autocomplete="dni" autofocus>

                                @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Nombre  --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Apellido Paterno --}}
                        <div class="form-group row">
                            <label for="fathersSurname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>

                            <div class="col-md-6">
                                <input id="fathersSurname" type="text" class="form-control @error('fathersSurname') is-invalid @enderror" name="fathersSurname" value="{{ old('fathersSurname') }}" required autocomplete="fathersSurname" autofocus>

                                @error('fathersSurname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Apellido Materno --}}
                        <div class="form-group row">
                            <label for="mothersSurname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Materno') }}</label>

                            <div class="col-md-6">
                                <input id="mothersSurname" type="text" class="form-control @error('mothersSurname') is-invalid @enderror" name="motherSurname" value="{{ old('mothersSurname') }}" required autocomplete="mothersSurname" autofocus>

                                @error('mothersSurname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Telefono --}}
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- N° Dpto --}}
                        <div class="form-group row">
                            <label for="numberLivingplace" class="col-md-4 col-form-label text-md-right"> N° Casa/Dpto</label>

                            <div class="col-md-6">
                                <input id="numberLivingplace" type="numberLivingplace" class="form-control @error('numberLivingplace') is-invalid @enderror" name="numberLivingplace" value="{{ old('numberLivingplace') }}" required autocomplete="numberLivingplace">

                                @error('numberLivingplace')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Boton --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
