@extends('adminlte::page')

@section('title', 'Clientes')
@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('admin.customers.create') }}" class="btn btn-success">
            <i class="fas fa-user-plus"></i> Novo Cliente
        </a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover table-bordered mb-0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th style="width: 180px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $customer)
                        <tr>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone ?? '-' }}</td>
                            <td>{{ $customer->address ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.customers.show', $customer) }}" class="btn btn-info btn-sm" title="Visualizar">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.customers.edit', $customer) }}" class="btn btn-warning btn-sm" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Tem certeza que deseja excluir este cliente?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" title="Excluir">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Nenhum cliente encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $customers->links() }}
        </div>
    </div>
@stop
