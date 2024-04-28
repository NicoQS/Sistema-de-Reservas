<div>

    <!-- component -->
    <div class="flex items-center justify-center py-12">

        <div class="max-w-sm w-full shadow-lg">

            <div class="md:p-8 p-5 dark:bg-gray-600 bg-white rounded-md">

                <div class="px-4 flex items-center justify-evenly">
                    <div class="flex items-center">
                        <button aria-label="calendar backward" class="focus:text-gray-400 hover:text-gray-400 text-gray-800 dark:text-gray-100" wire:click="decrementar('m')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <polyline points="15 6 9 12 15 18" />
                            </svg>
                        </button>
                        <span  tabindex="0" class="focus:outline-none text-xl font-bold dark:text-gray-100 text-gray-800">{{$meses[$contMes]}}</span>
                        <button aria-label="calendar forward" class="focus:text-gray-400 hover:text-gray-400 text-gray-800 dark:text-gray-100" wire:click="incrementar('m')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler  icon-tabler-chevron-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <polyline points="9 6 15 12 9 18" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex items-center">
                        <button aria-label="calendar backward" class="focus:text-gray-400 hover:text-gray-400 text-gray-800 dark:text-gray-100" wire:click="decrementar('')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <polyline points="15 6 9 12 15 18" />
                            </svg>
                        </button>
                        <span tabindex="0" class="focus:outline-none  text-xl font-bold dark:text-gray-100 text-gray-800">{{$anio}}</span>
                        <button aria-label="calendar forward" class="focus:text-gray-400 hover:text-gray-400 text-gray-800 dark:text-gray-100" wire:click="incrementar('')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler  icon-tabler-chevron-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <polyline points="9 6 15 12 9 18" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="pt-6">

                    <table class="mx-auto">
                        <thead>
                            <tr>
                                @foreach($diasSem as $diaS)
                                <th>
                                    <div class="py-1 px-1 w-full flex justify-center">
                                        <p class="text-xl font-bold text-center text-gray-800 dark:text-gray-100">{{$diaS}}</p>
                                    </div>
                                </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @while($diaMes <= $finCalendario)
                                    @php
                                        $claseGray = '';
                                        $claseHoy = '';
                                            $claseGray = $diaMes->isToday() && in_array($diaMes->format('Y-m-d'), $reservas) ? 'dark:text-red-400' : ($diaMes->isToday() ? 'dark:text-green-400' : ($diaMes < $fechaActual ? 'dark:text-gray-500' : (in_array($diaMes->format('Y-m-d'), $reservas) ? 'dark:text-red-400' : 'dark:text-green-400')));
                                            $claseHoy = $diaMes->isToday() && in_array($diaMes->format('Y-m-d'), $reservas) ? 'border border-sky-400 dark:text-red-400' : ($diaMes->isToday() ? 'border border-sky-400 dark:text-green-400' : '');
                                        @endphp
                                    <td>
                                        <div class="py-1 px-1 w-full flex justify-center">
                                            <p class="text-xl font-bold  {{$claseGray}} {{$claseHoy}} text-center">{{$diaMes->day}}</p>
                                        </div>
                                    </td>
                                    @if(($diaMes->dayOfWeek == 0) && ($diaMes != $finCalendario))
                                        </tr><tr>
                                    @endif
                                    @php
                                        $diaMes->addDay();
                                    @endphp
                                @endwhile
                            </tr>
                        </tbody>
                    </table>
                        <div class="mt-5 text-center dark:text-black font-bold">
                            <div class="bg-green-500 rounded-full">
                                <p>Disponible</p>
                            </div>
                            <div class="bg-red-500 rounded-full mt-2">
                                <p>Reservado</p>
                            </div>
                        </div>
                        <a href="{{route('reservar')}}" class="bg-blue-500 flex justify-center items-center w-full text-white px-2 py-2 mt-4 rounded-md focus:outline-none">Reservar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
