<?php declare(strict_types=1);

namespace App\Enums;

use Spatie\Enum\Enum as EnumEnum;

final class StatusBookingEnum extends EnumEnum
{
    const complete = 1;
    const pending = 2;
}
