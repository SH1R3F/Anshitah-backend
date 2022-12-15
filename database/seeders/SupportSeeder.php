<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Container\Container;

class SupportSeeder extends Seeder
{

    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed tickets
        for ($x = 0; $x < 50; $x++) {
            DB::table('support_tickets')->insert([
                'title' => $this->faker->sentence(),
                'user_id' => User::inRandomOrder()->first()->id,
                'status' => rand(0, 1),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ]);
        }

        // Seed messages
        for ($x = 0; $x < 300; $x++) {
            $ticket = DB::table('support_tickets')->inRandomOrder()->first();
            DB::table('support_messages')->insert([
                'ticket_id' => $ticket->id,
                'body' => $this->faker->sentence(),
                'user_id' => $ticket->user_id,
                'support_id' => 1,
                'sender' => rand(0, 1),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ]);
        }

        // Seed tickets
        for ($x = 0; $x < 50; $x++) {
            DB::table('inquires_tickets')->insert([
                'title' => $this->faker->sentence(),
                'user_id' => User::inRandomOrder()->first()->id,
                'status' => rand(0, 1),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ]);
        }

        // Seed messages
        for ($x = 0; $x < 300; $x++) {
            $ticket = DB::table('inquires_tickets')->inRandomOrder()->first();
            DB::table('inquires_messages')->insert([
                'ticket_id' => $ticket->id,
                'body' => $this->faker->sentence(),
                'user_id' => $ticket->user_id,
                'support_id' => 1,
                'sender' => rand(0, 1),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ]);
        }
    }


    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }
}
