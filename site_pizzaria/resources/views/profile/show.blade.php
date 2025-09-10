@extends('adminlte::page')

@section('title', 'Meu Perfil')


@section('content_header')
<h1>Meu Perfil</h1>
@stop

@section('content')
    <x-flash-messages/>
    <p><b>Nome:</b> {{ $customer->name }}</p>
    <p><b>Email:</b> {{ $customer->email }}</p>
    <p><b>Telefone:</b> {{ $customer->phone }}</p>
    <p><b>Endereço:</b> {{ $customer->address }}</p>
    <p><b>Função:</b> {{Auth::user()->role}}</p>
    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Editar Perfil</a>
@stop
