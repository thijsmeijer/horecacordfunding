<?php

namespace App\Enums;

enum InvestmentStatus: string
{
    case Pending = 'pending';
    case Accepted = 'accepted';
    case Rejected = 'rejected';

    public static function getValues(): array
    {
        return [
            self::Pending,
            self::Accepted,
            self::Rejected,
        ];
    }
}
