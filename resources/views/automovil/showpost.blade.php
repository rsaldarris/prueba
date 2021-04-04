<!-- Created by: Santiago Albisser -->

@extends('layouts.master')

@section("title",$data["title"])

@section('content')
<div class="container">
    <!-- <div class="row"> -->
        <div class="col-md-8 my-3">
            <div class="card bg-light mb-3 text-center">
                <div class="card-body">
                    <h2 class="card-title" style="color:blue">{{ $data["automovil"]->getMarca()}} : {{ $data["automovil"]->getModelo()}}<br/></h2>
                    <b>Placa:</b>  {{$data["automovil"]->getPlaca()}}<br/>
                    <b>Disponible:</b> {{ $data["automovil"]->getDisponible()}}<br/>
                    <b>Valor Comercial:</b>{{ $data["automovil"]->getValorComercial()}}<br/>
                    <b>Valor Alquiler:</b> {{ $data["automovil"]->getValorAlquiler()}}<br/>
                    @guest
                        <a href="{{ route('login') }}">@lang('messages.login')</a> <br>
                    @else
                        @if (Auth::user()->getRole()=="admin")
                            <form method="POST" action='{{ route("automovil.edit",$data["automovil"]->getId()) }}'>
                                @csrf
                                <br><button type="submit" id="button_add" class="btn btn-primary">@lang('messages.edit')</button>
                            </form>
                            <form method="POST" action='{{ route("automovil.delete",$data["automovil"]->getId()) }}'>
                                @csrf
                                <br><button type="submit" id="button_delete" class="btn btn-primary">@lang('messages.delete')</button>
                            </form>
                        @endif
                    @endguest
                </div>
            </div>
        </div>
</div>
@endsection 