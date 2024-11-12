<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Estação: ' . $station->title) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 text-left">
            <div class="sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-left">
                    <header>
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Informações da estação') }}
                        </h2>
                    </header>
                    <form class="mt-6 space-y-6">
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <x-input-label for="title" :value="__('Nome da estação')" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $station->title)" required autofocus autocomplete="title" readonly />
                            </div>
                            <div>
                                <x-input-label for="kind_of" :value="__('Tipo de estação')" />
                                <x-text-input id="kind_of" name="kind_of" type="text" class="mt-1 block w-full" :value="old('kind_of', $station->kind_of)" required autofocus autocomplete="kind_of" readonly />
                            </div>
                            <div>
                                <x-input-label for="anaplu_code" :value="__('Código ANAPLU')" />
                                <x-text-input id="anaplu_code" name="anaplu_code" type="text" class="mt-1 block w-full" :value="old('anaplu_code', $station->anaplu_code)" required autofocus autocomplete="anaplu_code" readonly />
                            </div>
                            <div>
                                <x-input-label for="rain_gauge_offset" :value="__('Offset pluviômetro')" />
                                <x-text-input id="rain_gauge_offset" name="rain_gauge_offset" type="text" class="mt-1 block w-full" :value="old('rain_gauge_offset', $station->rain_gauge_offset)" required autofocus autocomplete="rain_gauge_offset" readonly />
                            </div>
                            <div>
                                <x-input-label for="rain_gauge_slope" :value="__('Inclinação pluviômetro')" />
                                <x-text-input id="rain_gauge_slope" name="rain_gauge_slope" type="text" class="mt-1 block w-full" :value="old('rain_gauge_slope', $station->rain_gauge_slope)" required autofocus autocomplete="rain_gauge_slope" readonly />
                            </div>
                            <div>
                                <x-input-label for="streamflow_offset" :value="__('Offset vazão')" />
                                <x-text-input id="streamflow_offset" name="streamflow_offset" type="text" class="mt-1 block w-full" :value="old('streamflow_offset', $station->streamflow_offset)" required autofocus autocomplete="streamflow_offset" readonly />
                            </div>
                            <div>
                                <x-input-label for="streamflow_slope" :value="__('Inclinação vazão')" />
                                <x-text-input id="streamflow_slope" name="streamflow_slope" type="text" class="mt-1 block w-full" :value="old('streamflow_slope', $station->streamflow_slope)" required autofocus autocomplete="streamflow_slope" readonly />
                            </div>
                            <div>
                                <x-input-label for="solar_radiation_offset" :value="__('Offset radiação solar')" />
                                <x-text-input id="solar_radiation_offset" name="solar_radiation_offset" type="text" class="mt-1 block w-full" :value="old('solar_radiation_offset', $station->solar_radiation_offset)" required autofocus autocomplete="solar_radiation_offset" readonly />
                            </div>
                            <div>
                                <x-input-label for="solar_radiation_slope" :value="__('Inclinação radiação solar')" />
                                <x-text-input id="solar_radiation_slope" name="solar_radiation_slope" type="text" class="mt-1 block w-full" :value="old('solar_radiation_slope', $station->solar_radiation_slope)" required autofocus autocomplete="solar_radiation_slope" readonly />
                            </div>
                            <div>
                                <x-input-label for="air_temperature_offset" :value="__('Offset temperatura do ar')" />
                                <x-text-input id="air_temperature_offset" name="air_temperature_offset" type="text" class="mt-1 block w-full" :value="old('air_temperature_offset', $station->air_temperature_offset)" required autofocus autocomplete="air_temperature_offset" readonly />
                            </div>
                            <div>
                                <x-input-label for="air_temperature_slope" :value="__('Inclinação temperatura do ar')" />
                                <x-text-input id="air_temperature_slope" name="air_temperature_slope" type="text" class="mt-1 block w-full" :value="old('air_temperature_slope', $station->air_temperature_slope)" required autofocus autocomplete="air_temperature_slope" readonly />
                            </div>
                            <div>
                                <x-input-label for="relative_humidity_offset" :value="__('Offset umidade relativa')" />
                                <x-text-input id="relative_humidity_offset" name="relative_humidity_offset" type="text" class="mt-1 block w-full" :value="old('relative_humidity_offset', $station->relative_humidity_offset)" required autofocus autocomplete="relative_humidity_offset" readonly />
                            </div>
                            <div>
                                <x-input-label for="relative_humidity_slope" :value="__('Inclinação umidade relativa')" />
                                <x-text-input id="relative_humidity_slope" name="relative_humidity_slope" type="text" class="mt-1 block w-full" :value="old('relative_humidity_slope', $station->relative_humidity_slope)" required autofocus autocomplete="relative_humidity_slope" readonly />
                            </div>
                            <div>
                                <x-input-label for="wind_direction_offset" :value="__('Offset direção do vento')" />
                                <x-text-input id="wind_direction_offset" name="wind_direction_offset" type="text" class="mt-1 block w-full" :value="old('wind_direction_offset', $station->wind_direction_offset)" required autofocus autocomplete="wind_direction_offset" readonly />
                            </div>
                            <div>
                                <x-input-label for="wind_direction_slope" :value="__('Inclinação direção do vento')" />
                                <x-text-input id="wind_direction_slope" name="wind_direction_slope" type="text" class="mt-1 block w-full" :value="old('wind_direction_slope', $station->wind_direction_slope)" required autofocus autocomplete="wind_direction_slope" readonly />
                            </div>
                            <div>
                                <x-input-label for="wind_speed_offset" :value="__('Offset velocidade do vento')" />
                                <x-text-input id="wind_speed_offset" name="wind_speed_offset" type="text" class="mt-1 block w-full" :value="old('wind_speed_offset', $station->wind_speed_offset)" required autofocus autocomplete="wind_speed_offset" readonly />
                            </div>
                            <div>
                                <x-input-label for="wind_speed_slope" :value="__('Inclinação velocidade do vento')" />
                                <x-text-input id="wind_speed_slope" name="wind_speed_slope" type="text" class="mt-1 block w-full" :value="old('wind_speed_slope', $station->wind_speed_slope)" required autofocus autocomplete="wind_speed_slope" readonly />
                            </div>
                            <div>
                                <x-input-label for="atmospheric_pressure_offset" :value="__('Offset pressão atmosférica')" />
                                <x-text-input id="atmospheric_pressure_offset" name="atmospheric_pressure_offset" type="text" class="mt-1 block w-full" :value="old('atmospheric_pressure_offset', $station->atmospheric_pressure_offset)" required autofocus autocomplete="atmospheric_pressure_offset" readonly />
                            </div>
                            <div>
                                <x-input-label for="atmospheric_pressure_slope" :value="__('Inclinação pressão atmosférica')" />
                                <x-text-input id="atmospheric_pressure_slope" name="atmospheric_pressure_slope" type="text" class="mt-1 block w-full" :value="old('atmospheric_pressure_slope', $station->atmospheric_pressure_slope)" required autofocus autocomplete="atmospheric_pressure_slope" readonly />
                            </div>
                            <div>
                                <x-input-label for="number_of_readings" :value="__('Número de leituras')" />
                                <x-text-input id="number_of_readings" name="number_of_readings" type="text" class="mt-1 block w-full" :value="old('number_of_readings', $station->number_of_readings)" required autofocus autocomplete="number_of_readings" readonly />
                            </div>
                            <div>
                                <x-input-label for="scale" :value="__('Escala')" />
                                <x-text-input id="scale" name="scale" type="text" class="mt-1 block w-full" :value="old('scale', $station->scale)" required autofocus autocomplete="scale" readonly />
                            </div>
                            <div>
                                <x-input-label for="anaflu_code" :value="__('Código ANAFLU')" />
                                <x-text-input id="anaflu_code" name="anaflu_code" type="text" class="mt-1 block w-full" :value="old('anaflu_code', $station->anaflu_code)" required autofocus autocomplete="anaflu_code" readonly />
                            </div>
                            <div>
                                <x-input-label for="monitored_river" :value="__('Rio monitorado')" />
                                <x-text-input id="monitored_river" name="monitored_river" type="text" class="mt-1 block w-full" :value="old('monitored_river', $station->monitored_river)" required autofocus autocomplete="monitored_river" readonly />
                            </div>
                            <div>
                                <x-input-label for="drainage_area" :value="__('Área de drenagem')" />
                                <x-text-input id="drainage_area" name="drainage_area" type="text" class="mt-1 block w-full" :value="old('drainage_area', $station->drainage_area)" required autofocus autocomplete="drainage_area" readonly />
                            </div>
                            <div>
                                <x-input-label for="maximum_alert_percentage" :value="__('Percentual máximo de alerta')" />
                                <x-text-input id="maximum_alert_percentage" name="maximum_alert_percentage" type="text" class="mt-1 block w-full" :value="old('maximum_alert_percentage', $station->maximum_alert_percentage)" required autofocus autocomplete="maximum_alert_percentage" readonly />
                            </div>
                            <div>
                                <x-input-label for="overflow_level" :value="__('Nível de transbordamento')" />
                                <x-text-input id="overflow_level" name="overflow_level" type="text" class="mt-1 block w-full" :value="old('overflow_level', $station->overflow_level)" required autofocus autocomplete="overflow_level" readonly />
                            </div>
                            <div>
                                <x-input-label for="hydrographic_region" :value="__('Região hidrográfica')" />
                                <x-text-input id="hydrographic_region" name="hydrographic_region" type="text" class="mt-1 block w-full" :value="old('hydrographic_region', $station->hydrographic_region)" required autofocus autocomplete="hydrographic_region" readonly />
                            </div>
                            <div>
                                <x-input-label for="transmission" :value="__('Transmissão')" />
                                <x-text-input id="transmission" name="transmission" type="text" class="mt-1 block w-full" :value="old('transmission', $station->transmission)" required autofocus autocomplete="transmission" readonly />
                            </div>
                            <div>
                                <x-input-label for="transmission_operator" :value="__('Operador de transmissão')" />
                                <x-text-input id="transmission_operator" name="transmission_operator" type="text" class="mt-1 block w-full" :value="old('transmission_operator', $station->transmission_operator)" required autofocus autocomplete="transmission_operator" readonly />
                            </div>
                            <div>
                                <x-input-label for="number" :value="__('Número')" />
                                <x-text-input id="number" name="number" type="text" class="mt-1 block w-full" :value="old('number', $station->number)" required autofocus autocomplete="number" readonly />
                            </div>
                            <div>
                                <x-input-label for="modem" :value="__('Modem')" />
                                <x-text-input id="modem" name="modem" type="text" class="mt-1 block w-full" :value="old('modem', $station->modem)" required autofocus autocomplete="modem" readonly />
                            </div>
                            <div>
                                <x-input-label for="datalogger" :value="__('Datalogger')" />
                                <x-text-input id="datalogger" name="datalogger" type="text" class="mt-1 block w-full" :value="old('datalogger', $station->datalogger)" required autofocus autocomplete="datalogger" readonly />
                            </div>
                            <div>
                                <x-input-label for="latitude" :value="__('Latitude')" />
                                <x-text-input id="latitude" name="latitude" type="text" class="mt-1 block w-full" :value="old('latitude', $station->latitude)" required autofocus autocomplete="latitude" readonly />
                            </div>
                            <div>
                                <x-input-label for="longitude" :value="__('Longitude')" />
                                <x-text-input id="longitude" name="longitude" type="text" class="mt-1 block w-full" :value="old('longitude', $station->longitude)" required autofocus autocomplete="longitude" readonly />
                            </div>
                            <div>
                                <x-input-label for="altitude" :value="__('Altitude')" />
                                <x-text-input id="altitude" name="altitude" type="text" class="mt-1 block w-full" :value="old('altitude', $station->altitude)" required autofocus autocomplete="altitude" readonly />
                            </div>
                            <div>
                                <x-input-label for="municipality" :value="__('Município')" />
                                <x-text-input id="municipality" name="municipality" type="text" class="mt-1 block w-full" :value="old('municipality', $station->municipality)" required autofocus autocomplete="municipality" readonly />
                            </div>
                            <div>
                                <x-input-label for="state" :value="__('Estado')" />
                                <x-text-input id="state" name="state" type="text" class="mt-1 block w-full" :value="old('state', $station->state)" required autofocus autocomplete="state" readonly />
                            </div>
                            <div>
                                <x-input-label for="operator" :value="__('Operador')" />
                                <x-text-input id="operator" name="operator" type="text" class="mt-1 block w-full" :value="old('operator', $station->operator)" required autofocus autocomplete="operator" readonly />
                            </div>
                            <div>
                                <x-input-label for="purpose" :value="__('Finalidade')" />
                                <x-text-input id="purpose" name="purpose" type="text" class="mt-1 block w-full" :value="old('purpose', $station->purpose)" required autofocus autocomplete="purpose" readonly />
                            </div>
                            <div>
                                <x-input-label for="installation_date" :value="__('Data de instalação')" />
                                <x-text-input id="installation_date" name="installation_date" type="text" class="mt-1 block w-full" :value="old('installation_date', $station->installation_date)" required autofocus autocomplete="installation_date" readonly />
                            </div>
                            <div>
                                <x-input-label for="status" :value="__('Status')" />
                                <x-text-input id="status" name="status" type="text" class="mt-1 block w-full" :value="old('status', $station->status)" required autofocus autocomplete="status" readonly />
                            </div>
                            <div>
                                <x-input-label for="asset" :value="__('Ativo')" />
                                <x-text-input id="asset" name="asset" type="text" class="mt-1 block w-full" :value="old('asset', $station->asset)" required autofocus autocomplete="asset" readonly />
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>