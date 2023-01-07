<?php

namespace App\Contracts;

use Illuminate\Http\Client\Response;

interface CalculationService
{
	public function calculate(string $expression): Response;
}
