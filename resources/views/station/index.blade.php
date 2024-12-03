<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inventário de estações') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                <div class="col-span-1 md:col-span-1">
                    <div class="">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('Filtrar por estação') }}
                        </label>
                        <select id="station-filter" name="station" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">{{ __('Todas as estações') }}</option>
                            @foreach($stations as $station)
                                <option value="{{ $station->code }}" @selected($filteredStation == $station->code)>{{ $station->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-1">
                    <div class="">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('Filtrar por status') }}
                        </label>
                        <select id="status-filter" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">{{ __('Todos os Status') }}</option>
                            <option value="up" @selected($filteredStatus == 'up')>{{ __('Atualizado') }}</option>
                            <option value="alert" @selected($filteredStatus == 'alert')>{{ __('Atrasado') }}</option>
                            <option value="warning" @selected($filteredStatus == 'warning')>{{ __('Alerta') }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-1">
                    <div class="">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('Filtrar por data') }}
                        </label>
                        <input type="date" id="date-filter" name="date" value="{{ $filteredDate }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <div class="col-span-1 md:col-span-1">
                    <div class="">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            <span>&nbsp;</span>
                        </label>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Filtrar
                        </button>
                        <button type="reset" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            Limpar
                        </button>
                    </div>
                </div>
            </form>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                {{ __('Estação') }}
                            </th>
                            <th scope="col" class="py-3 px-6">
                                {{ __('Situação') }}
                            </th>
                            <th scope="col" class="py-3 px-6">
                                {{ __('Tipo') }}
                            </th>
                            <th scope="col" class="py-3 px-6">
                                {{ __('Última coleta') }}
                            </th>
                            <th scope="col" class="py-3 px-6">
                                {{ __('Nível') }}
                            </th>
                            <th scope="col" class="py-3 px-6">
                                {{ __('Ações') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stations as $station)
                            @php
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
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $station->title }}
                                </td>
                                <td class="py-4 px-6">
                                    <span class="bg-{{ $randomBadgeColor }}-100 text-{{ $randomBadgeColor }}-800 dark:bg-{{ $randomBadgeColor }}-900 dark:text-{{ $randomBadgeColor }}-300 text-xs font-medium px-2.5 py-0.5 rounded inline-flex items-center">
                                        {{ $statusText }}
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    {{ $station->kind_of }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ \Carbon\Carbon::parse($station->collected_at)->format('d/m/Y') }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $station->level }} Litros
                                </td>
                                <td class="py-4 px-6">
                                    <a href="{{ route('station_details', ['code' => $station->code]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('Detalhes') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
