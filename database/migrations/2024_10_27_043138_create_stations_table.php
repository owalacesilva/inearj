<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('code');
            $table->string('title');
            $table->string('kind_of');
            $table->string('anaplu_code'); // CÓDIGO ANA PLU
            $table->string('rain_gauge_offset'); // PLUVIOMETRO OFFSET
            $table->string('rain_gauge_slope'); // PLUVIOMETRO SLOPE
            $table->string('streamflow_offset'); // FLUVIOMETRIA OFFSET
            $table->string('streamflow_slope'); // FLUVIOMETRIA SLOPE
            $table->string('solar_radiation_offset'); // RADIAÇÃO SOLAR OFFSET
            $table->string('solar_radiation_slope'); // RADIAÇÃO SOLAR SLOPE
            $table->string('air_temperature_offset'); // TEMPERATURA DO AR OFFSET
            $table->string('air_temperature_slope'); // TEMPERATURA DO AR SLOPE
            $table->string('relative_humidity_offset'); // UMIDADE RELATIVA DO AR OFFSET
            $table->string('relative_humidity_slope'); // UMIDADE RELATIVA DO AR SLOPE
            $table->string('wind_direction_offset'); // DIREÇÃO DO VENTO OFFSET
            $table->string('wind_direction_slope'); // DIREÇÃO DO VENTO SLOPE
            $table->string('wind_speed_offset'); // INTENSIDADE DIREÇÃO DO VENTO OFFSET
            $table->string('wind_speed_slope'); // INTENSIDADE DIREÇÃO DO VENTO SLOPE
            $table->string('atmospheric_pressure_offset'); // PRESSÃO ATMOSFÉRICA OFFSET
            $table->string('atmospheric_pressure_slope'); // PRESSÃO ATMOSFÉRICA SLOPE
            $table->string('number_of_readings'); // NÚMERO DE LANCES
            $table->string('scale'); // ESCALA
            $table->string('anaflu_code'); // CÓDIGO ANA FLU
            $table->string('monitored_river'); // RIO MONITORADO
            $table->string('drainage_area'); // AREA DE DRENAGEM
            $table->string('maximum_alert_percentage'); // % PARA ALERTA MÁXIMO
            $table->string('overflow_level'); // COTA DE TRANSBORDO
            $table->string('hydrographic_region'); // REGIÃO HIDROGRÁFICA
            $table->string('transmission'); // TRANSMISSÃO
            $table->string('transmission_operator'); // OPERADORA TRANSMISSÃO
            $table->string('number'); // NÚMERO
            $table->string('modem'); // MODEM
            $table->string('datalogger'); // DATALOGGER
            $table->string('latitude'); // LATITUDE
            $table->string('longitude'); // LONGITUDE
            $table->string('altitude'); // ALTITUDE
            $table->string('municipality'); // MUNICÍPIO
            $table->string('state'); // ESTADO
            $table->string('operator'); // OPERADORA
            $table->string('purpose'); // FINALIDADE
            $table->string('installation_date'); // DATA DE IMPLANTAÇÃO
            $table->string('status'); // SITUAÇÃO
            $table->string('asset'); // PATRIMÔNIO
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stations');
    }
};
