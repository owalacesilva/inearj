<?php

namespace Database\Factories;

use App\Models\Station;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Station>
 */
class StationFactory extends Factory
{
    use WithoutModelEvents;

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Station::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->name(),
            'title' => $this->faker->name(),
            'kind_of' => $this->faker->name(),
            'anaplu_code' => $this->faker->name(),
            'rain_gauge_offset' => $this->faker->name(),
            'rain_gauge_slope' => $this->faker->name(),
            'streamflow_offset' => $this->faker->name(),
            'streamflow_slope' => $this->faker->name(),
            'solar_radiation_offset' => $this->faker->name(),
            'solar_radiation_slope' => $this->faker->name(),
            'air_temperature_offset' => $this->faker->name(),
            'air_temperature_slope' => $this->faker->name(),
            'relative_humidity_offset' => $this->faker->name(),
            'relative_humidity_slope' => $this->faker->name(),
            'wind_direction_offset' => $this->faker->name(),
            'wind_direction_slope' => $this->faker->name(),
            'wind_speed_offset' => $this->faker->name(),
            'wind_speed_slope' => $this->faker->name(),
            'atmospheric_pressure_offset' => $this->faker->name(),
            'atmospheric_pressure_slope' => $this->faker->name(),
            'number_of_readings' => $this->faker->name(),
            'scale' => $this->faker->name(),
            'anaflu_code' => $this->faker->name(),
            'monitored_river' => $this->faker->name(),
            'drainage_area' => $this->faker->name(),
            'maximum_alert_percentage' => $this->faker->name(),
            'overflow_level' => $this->faker->name(),
            'hydrographic_region' => $this->faker->name(),
            'transmission' => $this->faker->name(),
            'transmission_operator' => $this->faker->name(),
            'number' => $this->faker->name(),
            'modem' => $this->faker->name(),
            'datalogger' => $this->faker->name(),
            'latitude' => $this->faker->name(),
            'longitude' => $this->faker->name(),
            'altitude' => $this->faker->name(),
            'municipality' => $this->faker->name(),
            'state' => $this->faker->name(),
            'operator' => $this->faker->name(),
            'purpose' => $this->faker->name(),
            'installation_date' => $this->faker->name(),
            'status' => $this->faker->name(),
            'asset' => $this->faker->name(),
        ];
    }
}
