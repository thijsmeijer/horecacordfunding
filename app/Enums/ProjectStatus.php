<?php

namespace App\Enums;

Enum ProjectStatus: string
{
    case Pending = 'in afwachting';
    case Active = 'funding fase';
    case Repayment = 'aflossings fase';
    case Completed = 'afgerond';
    case Cancelled = 'geannuleerd';

    public static function getValues(): array
    {
        return [
            self::Pending,
            self::Active,
            self::Repayment,
            self::Completed,
            self::Cancelled,
        ];
    }
}
