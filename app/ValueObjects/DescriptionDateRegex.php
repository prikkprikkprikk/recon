<?php

declare(strict_types=1);

namespace App\ValueObjects;

use Illuminate\Support\Carbon;

class DescriptionDateRegex
{
    public Carbon $date;

    public function __construct(
        public string $description,
        public Carbon $posted_date,
    ) {
        $this->getDateFromDescription();
    }

    public function getDateFromDescription(): void
    {
        $date = $this->posted_date;

        $dateRegexes = [
            '/^(?<date>\d{2}\.\d{2}) /',         // Description starts with dd.mm
            '/^\*\d{4} (?<date>\d{2}\.\d{2}) /', // Description starts with ampersand and four last digits of card
        ];

        foreach ($dateRegexes as $dateRegex) {
            if (preg_match($dateRegex, $this->description, $matches)) {
                $date = Carbon::createFromFormat('d.m.Y', $matches['date'] . '.' . $date->format('Y'));
                break;
            }
            $date = $this->posted_date;
        }

        if ($date->month > $this->posted_date->month) {
            $date->subYear();
        };

        $this->date = $date;
    }
}
