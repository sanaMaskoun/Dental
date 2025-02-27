<?php declare(strict_types=1);

namespace App\Enums;

use Spatie\Enum\Enum as EnumEnum;


final class PaymentMethodEnum extends EnumEnum

{
    const full = 1;
    const installment = 2;


}
