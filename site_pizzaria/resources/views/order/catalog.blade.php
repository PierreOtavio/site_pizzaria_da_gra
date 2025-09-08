@extends('layouts.app')

@section('title', 'Catálogo')

@section('content')
    <h2 style="text-align:center;">Monte seu pedido!</h2>

    <form method="POST" action="{{ route('order.place') }}">
        @csrf

        {{-- SEÇÃO DE PIZZAS --}}
        <h3 style="margin-top:2em;">Pizzas</h3>
        <div style="display:flex; flex-wrap:wrap; gap:2em;">
            @foreach($products->where('type', 'pizza') as $pizza)
                <div class="card" style="width:260px;">
                    <h4>{{ $pizza->name }}</h4>
                    <p>{{ $pizza->description }}</p>
                    <p>
                        <strong>Preço:</strong> R$ {{ number_format($pizza->price, 2, ',', '.') }}
                    </p>
                    {{-- QUANTIDADE --}}
                    <label>
                        Quantidade:
                        <input 
                            type="number"
                            name="items[{{$loop->iteration}}][quantity]"
                            min="1"
                            value="1"
                            style="width:60px;"
                        >
                    </label>
                    {{-- SABORES --}}
                    <label style="display:block; margin-top:0.5em;">
                        Sabores:<br>
                        <select name="items[{{$loop->iteration}}][pizza_flavors][]" multiple size="2" style="width:95%;">
                            @foreach($pizzaFlavors as $flavor)
                                <option value="{{ $flavor->flavor_id }}">{{ $flavor->name }}</option>
                            @endforeach
                        </select>
                        <small><em>(Segure Ctrl para selecionar vários)</em></small>
                    </label>
                    {{-- HIDDEN CAMPOS --}}
                    <input type="hidden" name="items[{{$loop->iteration}}][product_id]" value="{{ $pizza->product_id }}">
                    <input type="hidden" name="items[{{$loop->iteration}}][unit_price]" value="{{ $pizza->price }}">
                </div>
            @endforeach
        </div>

        {{-- SEÇÃO DE BEBIDAS --}}
        <h3 style="margin-top:2em;">Bebidas</h3>
        <div style="display:flex; flex-wrap:wrap; gap:2em;">
            @foreach($products->where('type', 'drink') as $drink)
                <div class="card" style="width:220px; min-height:180px;">
                    <h4>{{ $drink->name }}</h4>
                    <p>{{ $drink->description }}</p>
                    <p>
                        <strong>Preço:</strong> R$ {{ number_format($drink->price, 2, ',', '.') }}
                    </p>
                    <label>
                        Quantidade:
                        <input 
                            type="number"
                            name="items[{{$loop->iteration + 100}}][quantity]"
                            min="1"
                            value="1"
                            style="width:60px;"
                        >
                    </label>
                    <input type="hidden" name="items[{{$loop->iteration + 100}}][product_id]" value="{{ $drink->product_id }}">
                    <input type="hidden" name="items[{{$loop->iteration + 100}}][unit_price]" value="{{ $drink->price }}">
                </div>
            @endforeach
        </div>

        <div style="margin-top:2em; text-align:center;">
            <button type="submit" style="font-size:1.2em; padding:0.8em 2em;">
                Fazer Pedido
            </button>
        </div>
    </form>
@endsection
