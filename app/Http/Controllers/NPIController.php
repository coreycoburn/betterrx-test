<?php

namespace App\Http\Controllers;

use App\Facades\NPI;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NPIController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $terms = $request->all();
        $npi = NPI::get($terms);

        return response()->json($npi, $npi['code']);
    }
}
