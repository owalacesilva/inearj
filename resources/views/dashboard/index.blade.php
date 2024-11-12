<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Painel de estações') }}
        </h2>
    </x-slot>
    <div class="pt-6 pb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-4">
                <div class="col-span-1 md:col-span-1">
                    <div class="p-4 bg-green-100 border border-green-300 rounded-lg shadow-lg dark:bg-green-900 dark:border-green-700">
                        <h5 class="mb-2 font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ __('Atualizados') }}
                        </h5>
                        <p class="text-gray-700 dark:text-gray-300">{{ $stations->where('status', 'ATUALIZADO')->count() }}</p>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-1">
                    <div class="p-4 bg-red-100 border border-red-300 rounded-lg shadow-lg dark:bg-red-900 dark:border-red-700">
                        <h5 class="mb-2 font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ __('Atrasados') }}
                        </h5>
                        <p class="text-gray-700 dark:text-gray-300">{{ $stations->where('status', 'ATRASADO')->count() }}</p>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-1">
                    <div class="p-4 bg-yellow-100 border border-yellow-300 rounded-lg shadow-lg dark:bg-yellow-900 dark:border-yellow-700">
                        <h5 class="mb-2 font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ __('Em alerta') }}
                        </h5>
                        <p class="text-gray-700 dark:text-gray-300">{{ $stations->where('status', 'ALERTA')->count() }}</p>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-1">
                    <div class="p-4 bg-gray-100 border border-gray-300 rounded-lg shadow-lg dark:bg-gray-900 dark:border-gray-700">
                        <h5 class="mb-2 font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ __('Em manutenção') }}
                        </h5>
                        <p class="text-gray-700 dark:text-gray-300">{{ $stations->where('status', 'MANUTENÇÃO')->count() }}</p>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-1">
                    <div class="p-4 bg-gray-100 border border-gray-300 rounded-lg shadow-lg dark:bg-gray-900 dark:border-gray-700">
                        <h5 class="mb-2 font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ __('Total') }}
                        </h5>
                        <p class="text-gray-700 dark:text-gray-300">{{ $stations->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form id="dashboard-form-filter" method="GET" action="{{ route('dashboard') }}">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                    <div class="col-span-1 md:col-span-1">
                        <div class="">
                            <label for="station-filter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                {{ __('Filtrar por estação') }}
                            </label>
                            <select id="station-filter-by-id" name="station" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">{{ __('Todas as estações') }}</option>
                                @foreach($stations as $station)
                                    <option value="{{ $station->id }}">{{ $station->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-span-1 md:col-span-1">
                        <div class="">
                            <label for="status-filter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                {{ __('Filtrar por status') }}
                            </label>
                            <select id="station-filter-by-status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">{{ __('Todos os Status') }}</option>
                                <option value="ATUALIZADO">{{ __('Atualizado') }}</option>
                                <option value="ATRASADO">{{ __('Atrasado') }}</option>
                                <option value="ALERTA">{{ __('Alerta') }}</option>
                                <option value="MANUTENÇÃO">{{ __('Manutenção') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-span-1 md:col-span-1">
                        <div class="">
                            <label for="date-filter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                {{ __('Filtrar por data') }}
                            </label>
                            <input type="date" id="station-filter-by-date" name="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <div class="col-span-1 md:col-span-1 flex items-center justify-center">
                        <div class="flex space-x-2">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                {{ __('Filtrar') }}
                            </button>
                            <button type="reset" class="px-4 py-2 bg-gray-500 text-white text-sm font-medium rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                                {{ __('Limpar') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <div id="dashboard-loading" class="hidden py-10">
                <div class="flex items-center justify-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="animate-spin h-5 w-5 text-gray-900 dark:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="23 4 23 10 17 10"></polyline>
                        <polyline points="1 20 1 14 7 14"></polyline>
                        <path d="M3.51 9a9 9 0 0114.36-3.36L23 10M1 14l5.64 5.64A9 9 0 0020.49 15"></path>
                    </svg>
                    <span class="text-sm font-medium text-gray-900 dark:text-white">{{ __('Sincronizando estações') }}</span>
                </div>
            </div>
            <div id="dashboard-stations" class="grid grid-cols-1 md:grid-cols-5 gap-1">
                @foreach($stations as $station)
                    @php
                        $twilightColors = ['twilight-primary', 'twilight-secondary', 'twilight-info'];
                        $randomTwilightKey = array_rand($twilightColors);
                        $randomTwilightColor = $twilightColors[$randomTwilightKey];
                        $badgeColors = [
                            'red',
                            'green',
                            'yellow'
                        ];
                        $randomBadgeKey = array_rand($badgeColors);
                        $randomBadgeColor = $badgeColors[$randomBadgeKey];
                        $statusText = $station->status;
                        if (strpos($randomBadgeColor, 'red') !== false) {
                            $statusText = 'ATRASADO';
                        } elseif (strpos($randomBadgeColor, 'green') !== false) {
                            $statusText = 'ATUALIZADO';
                        } elseif (strpos($randomBadgeColor, 'yellow') !== false) {
                            $statusText = 'ALERTA';
                        } else {
                            $statusText = 'MANUTENÇÃO';
                        }
                    @endphp
                    <div class="col-span-1 p-1">
                        <div class="max-w-sm p-3 bg-white border border-{{ $randomBadgeColor == 'red' ? 'red' : 'gray' }}-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-{{ $randomBadgeColor == 'red' ? 'red' : 'gray' }}-700 transition-transform transform hover:scale-105">
                            <a href="#">
                                <h5 class="mb-2 font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $station->title }}
                                </h5>
                            </a>
                            <div class="text mt-2">
                                <span class="bg-{{ $randomBadgeColor }}-100 text-{{ $randomBadgeColor }}-800 dark:bg-{{ $randomBadgeColor }}-900 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded inline-flex items-center">
                                    @if($randomBadgeColor == 'red')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-4a1 1 0 112 0v2a1 1 0 11-2 0v-2zm0-8a1 1 0 112 0v6a1 1 0 11-2 0V6z" clip-rule="evenodd" />
                                        </svg>
                                    @elseif($randomBadgeColor == 'yellow')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.366-.446.957-.446 1.323 0l7.071 8.571c.329.399.05.99-.462.99H1.811c-.512 0-.791-.591-.462-.99l7.071-8.571zM11 14a1 1 0 10-2 0 1 1 0 002 0zm-1-2a1 1 0 011-1h.01a1 1 0 01.99 1v.01a1 1 0 01-1 1H10a1 1 0 01-1-1v-.01a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                    {{ $statusText }}
                                </span>
                            </div>                    
                            <ul class="mt-4">
                                <li class="p-2 border-t border-gray-200 dark:border-gray-600">
                                    <strong class="text-gray-700 dark:text-gray-300">Última coleta</strong>
                                    <div class="text-gray-700 dark:text-gray-300">{{ \Carbon\Carbon::parse($station->installation_date)->format('d/m/Y') }}</div>
                                </li>
                                <li class="p-2 border-t border-gray-200 dark:border-gray-600">
                                    <strong class="text-gray-700 dark:text-gray-300 text-green-500">Nivel</strong></br>
                                    <span class="text-gray-700 dark:text-gray-300 text-green-500">200,00 Litros</span>
                                </li>
                            </ul>
                            <div class="mt-4 flex space-x-2">
                                <a href="{{ route('station_details', ['id' => $station->id]) }}" class="items-center px-3 py-2 text-sm font-medium text-center text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:text-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                                    Detalhes
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
