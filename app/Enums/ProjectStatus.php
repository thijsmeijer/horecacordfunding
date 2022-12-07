<?php

namespace App\Enums;

Enum ProjectStatus: string
{
    case Pending = 'afwachting';
    case Active = 'funding';
    case Repayment = 'aflossing';
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
