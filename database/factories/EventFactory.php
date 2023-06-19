<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $eventNumber = 1;
        return [
            'title' => "event-" .  $eventNumber++,
            'description' => fake()->paragraph,
            'location' => fake()->city,
            'start_date' =>  Carbon::now()->add(1, 'hour'),
            'end_date' => Carbon::now()->add(5, 'hour'),
            'size' => rand(1, 6),
            'owner_id' => User::factory()->create()->id,
            'visible' => 1
        ];
    }
}
