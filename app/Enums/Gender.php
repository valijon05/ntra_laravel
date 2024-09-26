<?php

namespace App\Enums;

enum Gender:string
{
 case MALE='male';
 case FEMALE='female';
    public function toString(): ?string
    {
        return match ($this) {
            self::MALE => 'Male',
            self::FEMALE => 'Female',

        };
    }
}
