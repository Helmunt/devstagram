@extends('layouts.app')

@section('titulo')

    {{ $post->titulo }}

@endsection

@section('contenido')
    <div class="container mx-auto flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo}}" class=" w-16 md:w-32 lg:w-80">

            <div class=" p-3">
                <p>0 Likes</p>
            </div>
            <div>
                <p class=" font-bold">
                    {{ $post->user->username}}
                </p>
                <p class=" text-sm text-gray-500">
                    {{ $post->created_at}}
                </p>
            </div>
        </div>
        <div class="md:w-1/2">
            2
        </div>
    </div>

@endsection
