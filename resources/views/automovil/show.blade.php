@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($data["automovil"] as $automovil)
            <div class="card bg-light mb-3 text-center">
                <div class="card-body">
                    <h5 class="card-title" style="color:blue">{{ $automovil->getMarca() }}</h5>
                    <a href="{{ route('automovil.showpost',$automovil->getId()) }}" id="button_go" class="btn btn-primary">@lang('messages.ir')</messagges></a>
                </div>
            </div>
            @endforeach
            @guest
            <br><a href="{{ route('login') }}">@lang('messages.login')</a>
            @else
            <div class="card bg-light mb-3 text-center">
                <div class="card-body">
                    <a href="{{ route('automovil.create') }}" id="button_go" class="btn btn-primary">Crear Automovil</a>
                </div>
            </div>
            @endguest
        </div>
    </div>
</div>
@endsection