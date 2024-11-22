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
            <div id="dashboard-stations" class="grid grid-cols-1 md:grid-cols-5 gap-1">
                @foreach($dataCollections as $station)
                    @php                        
                        if ($station['status'] === 'alert') {
                            $statusText = 'ATRASADO';
                            $statusColor = 'red';
                        } elseif ($station['status'] === 'up') {
                            $statusText = 'ATUALIZADO';
                            $statusColor = 'green';
                        } elseif ($station['status'] === 'warning') {
                            $statusText = 'ALERTA';
                            $statusColor = 'yellow';
                        } else {
                            $statusText = 'MANUTENÇÃO';
                            $statusColor = 'gray';
                        }
                    @endphp
                    <div class="col-span-1 p-1">
                        <div class="max-w-sm p-3 bg-white border border-{{ $statusColor == 'red' ? 'red' : 'gray' }}-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-{{ $statusColor == 'red' ? 'red' : 'gray' }}-700 transition-transform transform hover:scale-105">
                            <a href="#">
                                <h5 class="mb-2 font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $station['title'] }}
                                </h5>
                            </a>
                            <div class="text mt-2">
                                <span class="bg-{{ $statusColor }}-100 text-{{ $statusColor }}-800 dark:bg-{{ $statusColor }}-900 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded inline-flex items-center">
                                    @if($statusColor == 'red')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-4a1 1 0 112 0v2a1 1 0 11-2 0v-2zm0-8a1 1 0 112 0v6a1 1 0 11-2 0V6z" clip-rule="evenodd" />
                                        </svg>
                                    @elseif($statusColor == 'yellow')
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
                                    <div class="text-gray-700 dark:text-gray-300">{{ $station['collected_at'] }}</div>
                                </li>
                                <li class="p-2 border-t border-gray-200 dark:border-gray-600">
                                    <strong class="text-gray-700 dark:text-gray-300 text-green-500">Nivel</strong></br>
                                    <span class="text-gray-700 dark:text-gray-300 text-green-500">{{ $station['level'] }}</span>
                                </li>
                            </ul>
                            <div class="mt-4 flex space-x-2">
                                <a href="{{ route('station_details', ['code' => $station['code']]) }}" class="items-center px-3 py-2 text-sm font-medium text-center text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:text-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
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
