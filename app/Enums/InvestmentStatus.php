<?php

namespace App\Enums;

enum InvestmentStatus: string
{
    case pending = 'pending';
    case accepted = 'accepted';
    case rejected = 'rejected';

    public static function getValues(): array
    {
        return [
            self::pending,
            self::accepted,
            self::rejected,
        ];
    }
}
