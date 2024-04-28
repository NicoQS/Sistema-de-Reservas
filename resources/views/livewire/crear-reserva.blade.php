<div>
    <!-- component -->
    @if (Session::get('success'))
        <div class="alert alert-success mt-3">
            <strong>{{Session::get('success')}}</strong><br>
        </div>
    @endif
    <div class="relative py-10 px-10 sm:max-w-xl sm:mx-auto">
        <div class="relative px-4 py-10 dark:bg-gray-600 mx-8 md:mx-0 shadow rounded-md sm:p-10">
            <div class="max-w-md mx-auto">
                <div class="flex items-center space-x-5">
                    <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">i</div>
                    <div class="block pl-2 font-semibold text-xl self-start dark:text-gray-200">
                        <h2 class="leading-relaxed">Realizar Reserva</h2>
                        <p class="text-sm dark:text-gray-200 font-normal leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="divide-y divide-gray-200">
                    <div class="py-8 text-base leading-6 space-y-4 dark:text-gray-200 sm:text-lg sm:leading-7">
                        <div class="flex items-center space-x-4">
                            <div class="flex flex-col">
                                <label class="leading-loose">Fecha a Reservar</label>
                                <div class="relative focus-within:text-gray-600 text-gray-400">
                                    <input wire:model.live="fecha" type="date" name="fecha" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="25/02/2020">
                                    <div class="absolute left-3 top-2">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $fechaIncorrecta = '';
                            $disabled = '';
                        @endphp
                        @if ($fecha != null and $fecha >= $fechaActual and !in_array($fecha,$reservas))
                            <p class="text-green-500 text-md italic mt-2 font-bold">¡Fecha disponible!</p>
                        @else
                            <p class="text-red-300 text-md italic mt-2 font-bold">Fecha invalida o reservada</p>
                            @php
                                $fechaIncorrecta = 'cursor-not-allowed opacity-20';
                                $disabled = 'disabled';
                            @endphp
                        @endif
                    </div>
                    <div class="pt-4 flex items-center space-x-4">
                        <button class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none {{$fechaIncorrecta}}" {{$disabled}} wire:click="crearReserva(false)">Reservar</button>
                        <button class="bg-green-600 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none {{$fechaIncorrecta}}" {{$disabled}} wire:click="modal(true)">Pagar y Reservar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-dialog-modal wire:model='open'>
        <x-slot name='title'>
            <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Enter Billing Details</h1>
        </x-slot>
        <x-slot name='content'>

            <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
                <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                    <div class="w-full flex justify-start text-gray-600 mb-3">
                        <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet" width="52" height="52" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                            <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
                        </svg>
                    </div>
                    <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Ingrese Detalles de Facturación</h1>
                    <label for="name" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Nombre</label>
                    <input id="name" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="James" />
                    <label for="email2" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Numero de Tarjeta</label>
                    <div class="relative mb-5 mt-2">
                        <div class="absolute text-gray-600 flex items-center px-4 border-r h-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-credit-card" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <rect x="3" y="5" width="18" height="14" rx="3" />
                                <line x1="3" y1="10" x2="21" y2="10" />
                                <line x1="7" y1="15" x2="7.01" y2="15" />
                                <line x1="11" y1="15" x2="13" y2="15" />
                            </svg>
                        </div>
                        <input id="email2" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-16 text-sm border-gray-300 rounded border" placeholder="XXXX - XXXX - XXXX - XXXX" />
                    </div>
                    <label for="expiry" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Fecha de Expiración</label>
                    <div class="relative mb-5 mt-2">
                        <div class="absolute right-0 text-gray-600 flex items-center pr-3 h-full cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <rect x="4" y="5" width="16" height="16" rx="2" />
                                <line x1="16" y1="3" x2="16" y2="7" />
                                <line x1="8" y1="3" x2="8" y2="7" />
                                <line x1="4" y1="11" x2="20" y2="11" />
                                <rect x="8" y="15" width="2" height="2" />
                            </svg>
                        </div>
                        <input id="expiry" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="MM/YY" />
                    </div>
                    <label for="cvc" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">CVC</label>
                    <div class="relative mb-5 mt-2">
                        <input id="cvc" class="mb-8 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="MM/YY" />
                    </div>
                    <div class="flex items-center justify-start w-full">
                        <button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm" wire:click="crearReserva(true)">Pagar y Reservar</button>
                        <button class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" wire:click="modal(false)">Cancelar</button>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name='footer'>
        </x-slot>
    </x-dialog-modal>

</div>
