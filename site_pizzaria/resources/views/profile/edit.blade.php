@extends('adminlte::page')

@section('title', 'Editar Perfil')

@section('content_header')
    <h1>Editar Perfil</h1>
@stop

@section('content')
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $customer->name) }}">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $customer->email) }}">
        </div>
        <div class="mb-3">
            <label>Telefone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $customer->phone) }}">
        </div>
        <div class="mb-3">
            <label>Endereço</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $customer->address) }}">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@stop
