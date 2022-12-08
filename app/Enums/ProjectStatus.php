<?php

namespace App\Enums;

enum ProjectStatus: string
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

    public static function getLabel(string $value): ProjectStatus
    {
        return match ($value) {
            'afwachting' => self::Pending,
            'funding' => self::Active,
            'aflossing' => self::Repayment,
            'afgerond' => self::Completed,
            'geannuleerd' => self::Cancelled,
        };
    }

    public static function getValue(string $label): ProjectStatus
    {
        return match ($label) {
            'Pending' => self::Pending,
            'Active' => self::Active,
            'Repayment' => self::Repayment,
            'Completed' => self::Completed,
            'Cancelled' => self::Cancelled,
        };
    }
}
