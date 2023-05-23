<?php

namespace Tests\Feature;

use App\Http\Livewire\PublishEvent;
use Tests\TestCase;
use App\Models\User;
use App\Models\Event;

use Livewire\Livewire;

class PublishEventTest extends TestCase
{

    /** @test */
    public function event_page_contains_livewire_component()
    {
        $user =  User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $event = Event::factory()->create([
            'visible' => 0
        ]);

        $this->actingAs($user)
            ->get(route('event.show', $event->id))
            ->assertSuccessful()
            ->assertSeeLivewire('publish-event');
    }

    /** @test */
    public function can_set_visible(): void
    {
        $user =  User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $event = Event::factory()->create([
            'visible' => 0
        ]);

        $this->actingAs($user);

        Livewire::test(PublishEvent::class, ['event' => $event])
            ->call('publish');

        $this->assertTrue(Event::where('id', $event->id)->where('visible', 1)->exists());
    }


    /** @test */

    function is_redirected_to_event_page_after_update()

    {

        $user =  User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $event = Event::factory()->create([
            'visible' => 0
        ]);

        $this->actingAs($user);

        Livewire::test(PublishEvent::class, ['event' => $event])
            ->call('publish')
            ->assertRedirect(route('event.show', $event->id));
    }
}
