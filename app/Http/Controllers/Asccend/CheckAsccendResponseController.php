<?php

namespace App\Http\Controllers\Asccend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\CheckAsccendResponseService;

class CheckAsccendResponseController extends Controller
{
    protected $checkAsscendResponseService;

    public function __construct(CheckAsccendResponseService $checkAsscendResponseService)
    {
        $this->checkAsscendResponseService = $checkAsscendResponseService;
    }

    public function checkAsccendResponse(Request $request) {
        return $this->checkAsscendResponseService->checkAsscendResponse($request->all());
    }
}