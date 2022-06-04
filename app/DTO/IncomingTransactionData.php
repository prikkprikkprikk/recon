<?php

namespace App\DTO;

use DateTime;

class IncomingTransactionData
{
    public DateTime $date;
    public string $description;
    public int $amount;

    public function __construct(
        $date,
        $description,
        $amount,
    ) {
        $this->date = $date;
        $this->description = $description;
        $this->amount = $amount;
    }

    public function toArray(): array
    {
        return [
            'date' => $this->date->format('Y-m-d'),
            'description' => $this->description,
            'amount' => $this->amount,
        ];
    }

    public static function fromExcelRow($row)
    {
        $date = DateTime::createFromFormat('d.m.Y', $row['bokfort']);
        $description = $row['beskrivelse'];
        $amount = ( $row['ut_av_konto'] ?? $row['inn_pa_konto'] ) * 100;

        return new self(
            $date,
            $description,
            $amount,
        );
    }
}
