<?php

declare(strict_types=1);

namespace App\DTO;

use Illuminate\Support\Carbon;

class TransactionData
{
    public function __construct(
        public Carbon $date,
        public string $payee,
        public string $memo,
        public int $amount,
    ) {}

    public function toArray(): array
    {
        return [
            'date' => $this->date->format('Y-m-d'),
            'payee' => $this->payee,
            'memo' => $this->memo,
            'amount' => $this->amount,
        ];
    }

}
