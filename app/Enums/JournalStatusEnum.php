<?php

namespace App\Enums;

enum JournalStatusEnum:string {
    case Planned = 'planned';
    case Germinated = 'germinated';
    case Growing = 'growing';
    case Harvesting = 'harvesting';
    case Finished = 'finshed';
    case Failed = 'failed';

    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
        // ["deposit" => "Deposit", "withdraw" => "Withdraw"]
    }
}