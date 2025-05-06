<?php

namespace App\Services;

use App\Factory\CheckCdvFactory;

class CheckAsccendResponseService
{
    public function checkAsscendResponse($payload) {
        $request = $this->convertToHex($payload['isoMessage']);

        return response()->json($request);
    }

    private function convertToHex($data){
        $text = pack("H*", $data);
        return $text;
    }
}