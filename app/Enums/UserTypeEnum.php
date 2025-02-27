<?php declare(strict_types=1);

namespace App\Enums;

use Spatie\Enum\Enum as EnumEnum;

final class UserTypeEnum extends EnumEnum
{
    const admin = 1;
    const doctor = 2;
    const patient = 3;
}
