<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DuelsTableTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_next_round(): void
    {
        $user =  User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $event = Event::factory()->create([
            'status' => 'launched'
        ]);

        Participant::factory(4)->create([
            'event_id' => $event->id
        ]);

        $roundNumber = $event->rounds()->count() + 1;

    
        $this->actingAs($user)
            ->get(route('duels', $event->id))
            ->assertSuccessful()
            ->assertSeeLivewire('duels-table');
    }
}
