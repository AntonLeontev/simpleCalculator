<?php

namespace App\Services\Mathjs;

use App\Contracts\CalculationService;
use DomainException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class MathjsApi implements CalculationService
{
	protected const PATH = 'http://api.mathjs.org/v4/';

	public function calculate(string $expression): Response
	{
		$response =  Http::post(self::PATH, ['expr' => $expression]);

		if (!is_null($response['error'])) {
			throw new DomainException($response['error']);
		}

		return $response;
	}
}
