<?php

namespace App\Facades;

use App\Contracts\NPIInterface;
use App\Services\NPIRegistryClient;
use Illuminate\Support\Facades\Facade;
use Tests\Mocks\NPIRegistryClientFake;

/**
 * @method static get(array $terms = []): array
 *
 * @see NPIRegistryClient
 */
class NPI extends Facade
{
    public static function fake(): void
    {
        static::swap(new NPIRegistryClientFake());
    }

    protected static function getFacadeAccessor(): string
    {
        return NPIInterface::class;
    }
}
