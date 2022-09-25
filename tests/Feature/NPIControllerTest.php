<?php

namespace Tests\Feature;

use App\Facades\NPI;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class NPIControllerTest extends TestCase
{
    /** @test */
    public function it_returns_npi_records_matching_a_first_name(): void
    {
        NPI::fake();

        $this->json('POST', route('api.npi'), [
            'first_name' => 'Corey',
        ])->assertJson(static fn (AssertableJson $json) =>
            $json
                ->count(2)
                ->has('0.addresses')
        );
    }
}
