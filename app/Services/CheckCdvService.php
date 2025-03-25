<?php

namespace App\Services;

use App\Factory\CheckCdvFactory;

class CheckCdvService
{
    public function validateCdv($payload) {
        $class = "App\\Validators\\BillerCode".$payload['code'];

        if (!class_exists($class)) {
            return response()->json([
                'message' => "Biller CDV Class not found"
            ], 400);
        }
        
        $cdv = new CheckCdvFactory(new $class);
        $status = $cdv->validate($payload['value'], $payload['amount'], $payload['other_fields']);
        return response()->json([
            'data' => [
                'result' => $status
            ]
        ]);
    }
}