@extends('layouts.app')

@section('titulo')
    Registrate en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12  p-5 mb">
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen registro usuarios">
        </div>
        <div class="md:w-4/12 mr-5 ml-5 bg-white p-6 rounded-lg shadow-xl ">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-black">
                        Nombre
                    </label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Ingresa tu nombre"
                        class="border p-3 w-full rounded-lg"
                    />
                    @error ('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}</p>
                    @enderror

                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-black">
                        UserName
                    </label>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Tu nombre de usuario"
                        class="border p-3 w-full rounded-lg"
                    />
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-black">
                        E-mail
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Tu Correo Elecentronico"
                        class="border p-3 w-full rounded-lg"
                    />
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-black">
                        Password
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Password de Registro"
                        class="border p-3 w-full rounded-lg"
                    />
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-black">
                        Confirmar Password
                    </label>
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Repite tu password"
                        class="border p-3 w-full rounded-lg"
                    />
                </div>
                <input
                    type="submit"
                    value="Crear cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full
                    p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>

@endsection
