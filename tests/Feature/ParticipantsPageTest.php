<?php

namespace Tests\Feature;

use App\Http\Livewire\ParticipantsPage;
use Tests\TestCase;
use App\Models\Participant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

class ParticipantsPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function participants_status_radio_works_correctly()
    {
        $participantA = Participant::factory()->create();

        $participantB = Participant::factory()->create();
        Livewire::test(ParticipantsPage::class)
            ->assetSee($participantA->name);
    }
}
