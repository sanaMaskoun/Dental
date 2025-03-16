<?php declare(strict_types=1);

namespace App\Enums;

use Spatie\Enum\Enum as EnumEnum;

final class StatusJoinUsEnum extends EnumEnum
{
    const reject = 1;
    const approve = 2;
}
