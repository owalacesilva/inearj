<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Histórico de coletas') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                <div class="col-span-1 md:col-span-1">
                    <div class="">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('Filtrar por estação') }}
                        </label>
                        <select id="station-filter" name="station" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">{{ __('Todas as estações') }}</option>
                            @foreach($stations as $station)
                                <option value="{{ $station->id }}">{{ $station->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-1">
                    <div class="">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('Filtrar por data') }}
                        </label>
                        <input type="date" id="date-filter" name="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <div class="col-span-1 md:col-span-1 flex items-center justify-center">
                    <div class="flex items-center justify-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="animate-spin h-5 w-5 text-gray-900 dark:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="23 4 23 10 17 10"></polyline>
                            <polyline points="1 20 1 14 7 14"></polyline>
                            <path d="M3.51 9a9 9 0 0114.36-3.36L23 10M1 14l5.64 5.64A9 9 0 0020.49 15"></path>
                        </svg>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ __('Sincronizando niveis') }}</span>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                {{ __('Estação') }}
                            </th>
                            <th scope="col" class="py-3 px-6">
                                {{ __('Última consulta') }}
                            </th>
                            <th scope="col" class="py-3 px-6">
                                {{ __('Última coleta') }}
                            </th>
                            <th scope="col" class="py-3 px-6">
                                {{ __('Nível') }}
                            </th>
                            <th scope="col" class="py-3 px-6">
                                {{ __('Chuva') }}
                            </th>
                            <th scope="col" class="py-3 px-6">
                                {{ __('Ações') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pagination['data'] as $data)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $data['title'] }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ \Carbon\Carbon::parse($data['created_at'])->format('d/m/Y H:i:s') }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ \Carbon\Carbon::parse($data['collected_at'])->format('d/m/Y H:i:s') }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $data['level'] }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $data['rain'] }}
                                </td>
                                <td class="py-4 px-6">
                                    <a href="{{ route('station_details', ['code' => $data['code']]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('Detalhes') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
