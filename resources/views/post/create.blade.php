@extends('layouts.plantillaBase')

@section('contenido')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-3">
            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            <button class="btn btn-outline-primary" type="submit">Crear Post</button>
        </div>
    </form>
    

@endsection