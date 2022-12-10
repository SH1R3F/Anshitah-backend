<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Plan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'majal_awl' => $this->faker->name(),
            'hadf_istratiji' => $this->faker->name(),
            'hadf_tachghili' => $this->faker->name(),
            'mohima' => $this->faker->name(),
            'wasf_mohima' => $this->faker->name(),
            'date_start' => $this->faker->date(),
            'date_end' => $this->faker->date(),
            'al_moda' => $this->faker->name(),
            'adaa_idara' => $this->faker->name(),
            'adaa_madariss' => $this->faker->text(),
            'nokat_qiass' => $this->faker->text(),
            'ijraat' => $this->faker->text(),
            'amakin_tanfid' => $this->faker->text(),
            'asalib_tanfid' => $this->faker->text(),
            'aljihat_mosanida' => $this->faker->text()
        ];
    }
}
