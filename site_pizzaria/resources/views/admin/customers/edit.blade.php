@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <h1>Editar Cliente</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erro!</strong> Corrija os campos abaixo:
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow p-0">
        <div class="card-header" style="background: #2f3234;">
            <strong style="color: #cfb54f;">Dados do Cliente</strong>
        </div>
        <form action="{{ route('admin.customers.update', $customer) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group mb-2">
                    <label for="name">Nome <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control form-control-sm"
                           id="name" value="{{ old('name', $customer->name) }}" required maxlength="100">
                </div>
                <div class="form-group mb-2">
                    <label for="email">E-mail <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control form-control-sm"
                           id="email" value="{{ old('email', $customer->email) }}" required maxlength="100">
                </div>
                <div class="form-group mb-2">
                    <label for="phone">Telefone</label>
                    <input type="text" name="phone" class="form-control form-control-sm"
                           id="phone" value="{{ old('phone', $customer->phone) }}" maxlength="45">
                </div>
                <div class="form-group mb-2">
                    <label for="address">Endereço</label>
                    <input type="text" name="address" class="form-control form-control-sm"
                           id="address" value="{{ old('address', $customer->address) }}" maxlength="255">
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Salvar Alterações
                </button>
            </div>
        </form>
    </div>
@stop
