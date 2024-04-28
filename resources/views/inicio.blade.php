<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema de Reservas</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')


    </head>
</head>
<body>
    <div class="relative bg-white overflow-hidden">

        <div class="bg-white dark:bg-gray-900">
            <div class="flex justify-center h-screen">
                @php
                    $urlImg = 'https://media.discordapp.net/attachments/1139720770776481863/1160286910594437160/image_323.jpg?ex=65341c64&is=6521a764&hm=a58aa3b99157d2592d1e27ee6111bad8de163a190df8cb9aec88938d5a30e89f&=';
                @endphp
                <div class="hidden bg-cover lg:block lg:w-2/3" style="background-image: url({{$urlImg}})">
                    <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                        <div>
                            <h2 class="text-4xl font-bold text-white">Sistema de Reservas</h2>

                            <p class="max-w-xl mt-3 text-gray-300">Lorem ipsum dolor sit, amet consectetur adipisicing elit. In autem ipsa, nulla laboriosam dolores, repellendus perferendis libero suscipit nam temporibus molestiae</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                    <div class="flex-1">

                        <div class="text-center">
                            <h2 class="text-4xl font-bold text-center text-gray-700 dark:text-white">Sistema de Reservas</h2>
                        </div>

                        <div class="mt-8">
                            <div class="flex flex-col mb-2 text-center">
                                @if (Route::has('login'))
                                    @auth
                                        <div class="text-center">
                                            <p class="mt-3 text-gray-500 dark:text-gray-300 mb-4">Ya estas logueado</p>
                                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Inicio</a>
                                        </div>
                                    @else

                                        <form action="{{ route('login') }}">
                                            <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                    Ingresar
                                                </span>
                                              </button>
                                        </form>

                                        @if (Route::has('register'))
                                            <form action="{{ route('register') }}">
                                                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                        Registrarse
                                                    </span>
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                @endif
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

