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
        ])
            ->assertSuccessful()
            ->assertJson(static fn (AssertableJson $json) =>
                $json
                    ->has('result_count')
                    ->has('results')
                    ->has('code')
                    ->has('paginate')
                    ->has('max_results')
            );
    }

    /** @test */
    public function it_returns_a_422_if_no_search_terms_were_passed(): void
    {
        NPI::fake();

        $this->json('POST', route('api.npi'))->assertUnprocessable();
    }
}
