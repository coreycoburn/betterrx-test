<?php

namespace App\Providers;

use App\Contracts\NPIInterface;
use App\Services\NPIRegistryClient;
use Illuminate\Support\ServiceProvider;

class NPIRegistryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(NPIInterface::class, static fn () =>
            new NPIRegistryClient(
                config('services.npi.url'),
                config('services.npi.version'),
                (int) config('services.npi.paginate'),
                (int) config('services.npi.max_results'),
            ));
    }
}
