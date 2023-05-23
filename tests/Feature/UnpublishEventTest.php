<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Event;
use Livewire\Livewire;
use App\Http\Livewire\UnpublishEvent;


class UnpublishEventTest extends TestCase
{

     /** @test */
    function event_page_contains_livewire_component()
    {
        $user =  User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $event = Event::factory()->create([
            'visible' => 1
        ]);

        $this->actingAs($user)
            ->get(route('event.show', $event->id))
            ->assertSuccessful()
            ->assertSeeLivewire('unpublish-event');
    }

     /** @test */
     public function can_set_unvisible(): void
     {
         $user =  User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@example.com',
             'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
         ]);
 
         $event = Event::factory()->create([
             'visible' => 1
         ]);
 
         $this->actingAs($user);
 
         Livewire::test(UnpublishEvent::class, ['event' => $event])
             ->call('unpublish');
 
         $this->assertTrue(Event::where('id', $event->id)->where('visible', 0)->exists());
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
            'visible' => 1
        ]);

        $this->actingAs($user);

        Livewire::test(UnpublishEvent::class, ['event' => $event])
            ->call('unpublish')
            ->assertRedirect(route('event.show', $event->id));
    }
}
