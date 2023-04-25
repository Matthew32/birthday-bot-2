<?php

namespace Api\Birthday\Infrastructure\Controllers;

use App\Http\Controllers\Controller;

class Resource extends Controller
{
    public function index(\Matt\Birthday\Application\UseCases\Get $mattBirthdayGetUseCase)
    {
        return response()->json($mattBirthdayGetUseCase());
    }
}
