@extends('layouts.plantillaBase')

@section('contenido')

    <div class="mb-3">
        <div class="d-inline-block">
            <a class="btn btn-outline-success" href="{{ route('posts.create') }}">Create</a>
        </div>
        <div class="mx-5 d-inline-block float-right">
            <form method="POST" action="{{ route('logout') }}" class="d-inline-block">
                @csrf
    
                <a class="btn btn-outline-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                this.closest('form').submit();">
                    {{ __('Cerrar Sesión') }}
                </a>
            </form>
        </div>
    </div>

    @if (session('status'))
        {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('status') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> --}}
    @endif


    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created By</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit</a>

                        <form class="d-inline-block" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection