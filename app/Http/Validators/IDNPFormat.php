<?php

namespace App\Http\Validators;

use Illuminate\Validation\Validator;

/**
 * Class IDNPFormat
 * @package App\Http\Validators
 */
class IDNPFormat
{
    public function validate(string $attribute, string $value, array $parameters, Validator $validator): bool
    {
        return true;
        return $this->isValid($value);
    }

    private function isValid(string $idnp): bool
    {
        if (strlen($idnp) !== 13) {
            return false;
        }

        $crc = 0;
        $idnpExploded = str_split($idnp);
        for ($i = 0; $i < 12; $i++) {
            if (($idnpExploded[$i] < '0') || ($idnpExploded[$i] > '9')) {
                return false;
            }
            if ((($i % 3) === 0)) {
                $crc += ($idnpExploded[$i] - '0') * (7);
            } else {
                $crc += ($idnpExploded[$i] - '0') * (((($i % 3) === 1) ? 3 : 1));
            }
        }

        if (($idnpExploded[12] < '0') || ($idnpExploded[12] > '9')) {
            return false;
        }

        return ($crc % 10) === ($idnpExploded[12] - '0');
    }
}
