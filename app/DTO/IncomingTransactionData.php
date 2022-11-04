<?php

declare(strict_types=1);

namespace App\DTO;

use Illuminate\Support\Carbon;

class IncomingTransactionData
{
    public function __construct(
        public Carbon $posted_date,
        public Carbon $interest_date,
        public string $text_code,
        public string $description,
        public int $amount,
        public string $archival_reference,
        public string $contra_account,
    ) {}

    public function toArray(): array
    {
        return [
            'posted_date' => $this->posted_date->format('Y-m-d'),
            'interest_date' => $this->interest_date->format('Y-m-d'),
            'text_code' => $this->text_code,
            'description' => $this->description,
            'amount' => $this->amount,
            'archival_reference' => $this->archival_reference,
            'contra_account' => $this->contra_account,
        ];
    }

    public static function fromExcelRow($row)
    {
        return new self(
            posted_date: Carbon::createFromFormat('d.m.Y', $row['bokfort']),
            interest_date: Carbon::createFromFormat('d.m.Y', $row['rentedato']),
            text_code: $row['tekstkode'],
            description: $row['beskrivelse'],
            amount: intval(($row['ut_av_konto'] ?? $row['inn_pa_konto']) * 100),
            archival_reference: $row['arkivref'],
            contra_account: $row['motkonto'],
        );
    }
}
