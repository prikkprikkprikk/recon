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
        $this->date = $this->posted_date;
        $this->getDateFromDescription();
    }

    public function getDateFromDescription(): void
    {
        $dateRegexes = collect([
            '/^(?<date>\d{2}\.\d{2}) /',         // Description starts with dd.mm
            '/^\*\d{4} (?<date>\d{2}\.\d{2}) /', // Description starts with ampersand and four last digits of card
        ]);

        $dateRegexes->each(function ($regex) {
            if (preg_match($regex, $this->description, $matches)) {
                $this->date = Carbon::createFromFormat('d.m.Y', $matches['date'] . '.' . $this->posted_date->year);
                return false; // break out of each()
            }
        });

        if ($this->date->month > $this->posted_date->month) {
            $this->date->subYear();
        };
    }
}
