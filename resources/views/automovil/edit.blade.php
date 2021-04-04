@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-body">
                <h2 class="card-title" style="color: blue; text-align:center;">Editar Automovil</h2>
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
                        
                        <form method="POST" action="{{ route('automovil.saveEdit') }}">
                            @csrf
                        <br><b>Marca:           </b><input type="text" placeholder="Marca" name="marca" value="{{ $data['automovil']['marca']  }}" /> </br>
                        <br><b>Modelo:          </b><input type="text" placeholder="Modelo" name="modelo" value="{{ $data['automovil']['modelo']  }}" /> </br>
                        <br><b>Valor Comercial: </b><input type="text" placeholder="Valor Comercial" name="valor_comercial" value="{{ $data['automovil']['valor_comercial']  }}" /> </br>
                        <br><b>Valor Alquiler:  </b><input type="text" placeholder="Valor Alquiler" name="valor_alquiler" value="{{ $data['automovil']['valor_alquiler']  }}" /> </br>
                        <br><b>Disponible:      </b><input type="text" placeholder="Disponible" name="disponible" value="{{ $data['automovil']['disponible']  }}" /> </br>
                        <br><b>Placa:           </b><input type="text" placeholder="Placa" name="placa" value="{{ $data['automovil']['placa']  }}" /> </br>
                        <input type="hidden" name="id" value="{{$data['automovil']['id']}}">
                        <br> <input type="submit" id="button_save" class="btn btn-primary" value="@lang('messages.edit')" />
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection