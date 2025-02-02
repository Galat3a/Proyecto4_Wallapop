@extends('main.base')

@section('content')
<div class="container">
    <h1 class="text-center my-4">¿Qué vas a Vender?</h1>

    <form action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="images" class="form-label">Imágenes</label>
            <input type="file" class="form-control" id="images" name="images[]" multiple>
        </div>
        <div class="mb-3">
            <label for="product" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="product" name="product" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoría</label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                @endforeach
            </select>
        </div>   
        <div class="mb-3">
            <label for="price" class="form-label">Precio (€)</label>
            <input type="number" 
                   class="form-control" 
                   id="price" 
                   name="price" 
                   step="0.01" 
                   min="0" 
                   placeholder="Ejemplo: 99.99"
                   required>
        </div>
        <button type="submit" class="btn btn-primary">Subir Articulo</button>
    </form>
</div>
@endsection