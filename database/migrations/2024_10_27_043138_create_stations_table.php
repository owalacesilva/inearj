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
            $table->string('status')->nullable(); // SITUAÇÃO
            $table->string('anaplu_code')->nullable(); // CÓDIGO ANA PLU
            $table->string('rain_gauge_offset')->nullable(); // PLUVIOMETRO OFFSET
            $table->string('rain_gauge_slope')->nullable(); // PLUVIOMETRO SLOPE
            $table->string('streamflow_offset')->nullable(); // FLUVIOMETRIA OFFSET
            $table->string('streamflow_slope')->nullable(); // FLUVIOMETRIA SLOPE
            $table->string('solar_radiation_offset')->nullable(); // RADIAÇÃO SOLAR OFFSET
            $table->string('solar_radiation_slope')->nullable(); // RADIAÇÃO SOLAR SLOPE
            $table->string('air_temperature_offset')->nullable(); // TEMPERATURA DO AR OFFSET
            $table->string('air_temperature_slope')->nullable(); // TEMPERATURA DO AR SLOPE
            $table->string('relative_humidity_offset')->nullable(); // UMIDADE RELATIVA DO AR OFFSET
            $table->string('relative_humidity_slope')->nullable(); // UMIDADE RELATIVA DO AR SLOPE
            $table->string('wind_direction_offset')->nullable(); // DIREÇÃO DO VENTO OFFSET
            $table->string('wind_direction_slope')->nullable(); // DIREÇÃO DO VENTO SLOPE
            $table->string('wind_speed_offset')->nullable(); // INTENSIDADE DIREÇÃO DO VENTO OFFSET
            $table->string('wind_speed_slope')->nullable(); // INTENSIDADE DIREÇÃO DO VENTO SLOPE
            $table->string('atmospheric_pressure_offset')->nullable(); // PRESSÃO ATMOSFÉRICA OFFSET
            $table->string('atmospheric_pressure_slope')->nullable(); // PRESSÃO ATMOSFÉRICA SLOPE
            $table->string('number_of_readings')->nullable(); // NÚMERO DE LANCES
            $table->string('scale')->nullable(); // ESCALA
            $table->string('anaflu_code')->nullable(); // CÓDIGO ANA FLU
            $table->string('monitored_river')->nullable(); // RIO MONITORADO
            $table->string('drainage_area')->nullable(); // AREA DE DRENAGEM
            $table->string('maximum_alert_percentage')->nullable(); // % PARA ALERTA MÁXIMO
            $table->string('overflow_level')->nullable(); // COTA DE TRANSBORDO
            $table->string('hydrographic_region')->nullable(); // REGIÃO HIDROGRÁFICA
            $table->string('transmission')->nullable(); // TRANSMISSÃO
            $table->string('transmission_operator')->nullable(); // OPERADORA TRANSMISSÃO
            $table->string('number')->nullable(); // NÚMERO
            $table->string('modem')->nullable(); // MODEM
            $table->string('datalogger')->nullable(); // DATALOGGER
            $table->string('latitude')->nullable(); // LATITUDE
            $table->string('longitude')->nullable(); // LONGITUDE
            $table->string('altitude')->nullable(); // ALTITUDE
            $table->string('municipality')->nullable(); // MUNICÍPIO
            $table->string('state')->nullable(); // ESTADO
            $table->string('operator')->nullable(); // OPERADORA
            $table->string('purpose')->nullable(); // FINALIDADE
            $table->string('installation_date')->nullable(); // DATA DE IMPLANTAÇÃO
            $table->string('asset')->nullable(); // PATRIMÔNIO
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
