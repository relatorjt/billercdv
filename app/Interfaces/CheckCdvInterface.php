<?php

namespace App\Interfaces;

interface CheckCdvInterface
{
    public function validate($mainField, $amount, $other_fields): bool;
}
