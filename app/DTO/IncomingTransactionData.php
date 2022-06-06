<?php

declare(strict_types=1);

namespace App\DTO;

use DateTime;

class IncomingTransactionData
{
    public function __construct(
        public DateTime $posted_date,
        public DateTime $interest_date,
        public string $text_code,
        public string $description,
        public int $amount,
        public string $archival_reference,
        public string $contra_account,
    ) {
        $this->posted_date = $posted_date;
        $this->interest_date = $interest_date;
        $this->description = $description;
        $this->amount = $amount;
    }

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
            posted_date: DateTime::createFromFormat('d.m.Y', $row['bokfort']),
            interest_date: DateTime::createFromFormat('d.m.Y', $row['rentedato']),
            text_code: $row['tekstkode'],
            description: $row['beskrivelse'],
            amount: intval(($row['ut_av_konto'] ?? $row['inn_pa_konto']) * 100),
            archival_reference: $row['arkivref'],
            contra_account: $row['motkonto'],
        );
    }
}
