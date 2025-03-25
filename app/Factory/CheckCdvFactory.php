<?php

namespace App\Factory;

use App\Interfaces\CheckCdvInterface;

class CheckCdvFactory
{
    private $validator;

    public function __construct(CheckCdvInterface $validator)
    {
        $this->validator = $validator;
    }

    public function validate($mainValue, $amount, $other_fields): bool
    {
        return $this->validator->validate($mainValue, $amount, $other_fields);
    }
}
