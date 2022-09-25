<?php

namespace App\Services;

use App\Contracts\NPIInterface;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NPIRegistryClient implements NPIInterface
{
    public function __construct(private string $url, private string $version)
    {
    }

    public function get(array $terms = []): array
    {
        try {
            $response = Http::get($this->url, array_merge($terms, ['version' => $this->version]));

            return json_decode($response->body(), true, 512, JSON_THROW_ON_ERROR)['results'];
        } catch (Exception) {
            Log::error('Error connecting to registry.');

            return [];
        }
    }
}
