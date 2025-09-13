@extends('adminlte::page')

@section('title', 'Detalhes do Cliente')

@section('content_header')
    <h1>Cliente: {{ $customer->name }}</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header" style="background: #2f3234">
            <strong style="color: #cfb54f;">Informações do Cliente</strong>
        </div>
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">Nome</dt>
                <dd class="col-sm-9">{{ $customer->name }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $customer->email }}</dd>

                <dt class="col-sm-3">Telefone</dt>
                <dd class="col-sm-9">{{ $customer->phone ?? '-' }}</dd>

                <dt class="col-sm-3">Endereço</dt>
                <dd class="col-sm-9">{{ $customer->address ?? '-' }}</dd>

                <dt class="col-sm-3">Cadastrado em</dt>
                <dd class="col-sm-9">{{ $customer->created_at->format('d/m/Y H:i') }}</dd>
            </dl>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
            <a href="{{ route('admin.customers.edit', $customer) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar
            </a>
            <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST" class="d-inline" 
                onsubmit="return confirm('Tem certeza que deseja excluir este cliente?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">
                    <i class="fas fa-trash"></i> Excluir
                </button>
            </form>
        </div>
    </div>
@stop
