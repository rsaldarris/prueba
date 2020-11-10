<!--Created by: Juan Pablo Leal-->

@extends('layouts.master')

@section('content')

<div class="container mb-5">
    <div class="col-md">
        <div class="text-center">
            <h3 class="card-title" style="color:deeppink"><small>@lang('messages.purchase_made')</small></h3>
            <form action="{{ route('product.generateFile', $id) }}" method="POST">
                @csrf
                <select type="text"  name="select">
                    <option value="pdf">@lang('messages.pdf')</option>
                    <option value="excel">@lang('messages.excel')</option>
                </select>
                <br>
                <input type="hidden" name="pdf" value="{{ Auth::user()->getName() }}">
                <input type="hidden" name="id" value="{{ Auth::user()->getId() }}">
                <br><button type="submit" class="btn btn-primary" id="button_add">@lang('messages.download')</button>
            </form>
            <br><a href="{{ route('home.index') }}" class="btn btn-primary" id="button_add">@lang('messages.return')</a>
        </div>
    </div>
</div>

@endsection