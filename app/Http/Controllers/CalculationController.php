<?php

namespace App\Http\Controllers;

use App\Contracts\CalculationService;
use Illuminate\Http\Request;
use App\Http\Requests\CalculationRequest;
use DomainException;

class CalculationController extends Controller
{
    public function calculate(CalculationRequest $request, CalculationService $service)
    {
        try {
            $response = $service->calculate($request->expression);
        } catch (DomainException $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

        return $response['result'];
    }
}
