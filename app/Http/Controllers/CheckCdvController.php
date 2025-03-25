<?php

namespace App\Http\Controllers;

use App\Services\CheckCdvService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CheckCdvController extends Controller
{
    protected $checkCdvService;

    public function __construct(CheckCdvService $checkCdvService)
    {
        $this->checkCdvService = $checkCdvService;
    }

    public function validateCdv(Request $request) {
        try {
            $validated = $request->validate([
                'code' => 'required|string',
                'value' => 'required|string',
                'amount' => 'required|numeric',
                'other_fields' => ''
            ]);

            $payload = [
                'code' => $validated['code'],
                'value' => $validated['value'],
                'amount' => $validated['amount'],
                'other_fields' => $validated['other_fields'],
            ];

            $result = $this->checkCdvService->validateCdv($payload);

            // Return a success response with the validated data
            return response()->json([
                'message' => 'Validation successful',
                'data' => $result
            ], 200);

        } catch (ValidationException $e) {
            // Return a response with validation errors
            return response()->json([
                'errors' => $e->errors()
            ], 422);
        } catch (\Throwable $e) {
            // Return a response for any other errors
            return response()->json([
                'error' => 'An unexpected error occurred'
            ], 500);
        }
    }
}