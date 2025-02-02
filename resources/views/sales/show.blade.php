

@extends('main.base')

@section('content')
<div class="container">
    <h1 class="text-center my-4">{{ $sale->product }}</h1>

    <div class="card mb-4">
        @if($sale->img)
            <img src="data:image/jpeg;base64,{{ base64_encode($sale->img) }}" class="card-img-top" alt="{{ $sale->product }}">
        @else
            <img src="{{ asset('images/default-thumbnail.jpg') }}" class="card-img-top" alt="Sin imagen">
        @endif

        <div class="card-body">
            <h5 class="card-title">{{ $sale->product }}</h5>
            <p class="card-text">{{ $sale->description }}</p>
            <p class="card-text">
                <strong>Precio:</strong> ${{ number_format($sale->price, 2) }} <br>
                <strong>Categoría:</strong> {{ $sale->categoria->name }} <br>
                <strong>Vendedor:</strong> {{ $sale->user->name }}
            </p>
            <a href="{{ route('sales.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
