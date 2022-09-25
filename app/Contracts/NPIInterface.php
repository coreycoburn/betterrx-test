<?php

namespace App\Contracts;

interface NPIInterface
{
    public function get(array $terms = []): array;
}
