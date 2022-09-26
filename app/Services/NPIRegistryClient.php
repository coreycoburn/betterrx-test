<?php

namespace App\Services;

use App\Contracts\NPIInterface;
use App\Exceptions\NPIException;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NPIRegistryClient implements NPIInterface
{
    public function __construct(private string $url, private string $version, private int $paginate, private int $maxResults)
    {
    }

    public function get(array $terms = []): array
    {
        try {
            $response = Http::get($this->url, array_merge($terms, [
                'limit' => $this->paginate,
                'version' => $this->version,
            ]));

            $data = json_decode($response->body(), true, 512, JSON_THROW_ON_ERROR);

            if (isset($data['Errors'])) {
                throw new NPIException($data['Errors'][0]['description'], 422);
            }

            $data['code'] = 200;
            $data['paginate'] = $this->paginate;
            $data['max_results'] = $this->maxResults;

            return  $data;
        } catch (NPIException $exception) {
            return [
                'code' => $exception->getCode(),
                'message' => $exception->getMessage(),
            ];
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            return [
                'code' => $exception->getCode(),
                'message' => $exception->getMessage(),
            ];
        }
    }
}
