<!-- Created by: Santiago Albisser -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-body">
                <h2 class="card-title" style="color: blue; text-align:center;"> Crear Automovil</h2>
                    @guest
                        @lang('messages.guestCreatePost')<a href="{{ route('login') }}">@lang('messages.login')</a>
                    @else
                        @if($errors->any())
                        <ul id="errors">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <form method="POST" action="{{ route('automovil.save') }}">
                            @csrf
                        <br><b>Placa (ID):      </b><input type="text" placeholder="Placa(ID)" name="placa" value="{{ old('placa') }}" /> </br>
                        <br><b>Marca:           </b><input type="text" placeholder="Marca" name="marca" value="{{ old('marca') }}" /> </br>
                        <br><b>Modelo:          </b><input type="text" placeholder="Modelo" name="modelo" value="{{ old('modelo') }}" /> </br>
                        <br><b>Valor Comercial: </b><input type="text" placeholder="Valor Comercial" name="valor_comercial" value="{{ old('valor_comercial') }}" /> </br>
                        <br><b>Valor Alquiler:  </b><input type="text" placeholder="Valor Alquiler" name="valor_alquiler" value="{{ old('valor_alquiler') }}" /> </br>
                        <br><b>Disponible:      </b><input type="text" placeholder="Disponible" name="disponible" value="{{ old('disponible') }}" /> </br>
                        <br> <input type="submit" id="button_save" class="btn btn-primary" value="@lang('messages.save')" />
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection