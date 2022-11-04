<?php

use Illuminate\Support\Carbon;
use App\ValueObjects\DescriptionDateRegex;

it(
    'should pick correct date from description',
    function (string $description, string $posted_date, string $expected_date) {

        // Arrange
        $regex = new DescriptionDateRegex(
            description: $description,
            posted_date: Carbon::createFromFormat('d.m.Y', $posted_date),
        );

        // Act

        // Assert
        expect($regex->date->format('d.m.Y'))->toBe($expected_date);
    }
)->with([
    [
        "*9315 30.05 NOK 106.20 FORTUM.COM* FORTUM STR Kurs: 1.0000",
        "31.05.2022",
        "30.05.2022",
    ],
    [
        "30.05 SO-HF SARPSBORG REKTOR ØSTBY FREDRIKSTAD",
        "30.05.2022",
        "30.05.2022",
    ],
    [
        "*9315 25.05 NOK 55.00 APPLE.COM/BILL Kurs: 1.0000",
        "27.05.2022",
        "25.05.2022",
    ],
    [
        "*9315 15.05 NOK 101.39 FORTUM.COM* FORTUM MAR Kurs: 1.0000",
        "16.05.2022",
        "15.05.2022",
    ],
    [
        "*9315 12.05 NOK 19.00 HELSEBOKA.NO Kurs: 1.0000",
        "13.05.2022",
        "12.05.2022",
    ],
    [
        "30.04 REMA VESTBY SENTERVEIEN  VESTBY",
        "02.05.2022",
        "30.04.2022",
    ],
]);


it(
    "should subtract a year if month in description is greater than month in posted_date",
    function (string $description, string $posted_date, string $expected_date) {
        // Arrange
        $regex = new DescriptionDateRegex(
            description: $description,
            posted_date: Carbon::createFromFormat('d.m.Y', $posted_date),
        );

        // Act

        // Assert
        expect($regex->date->format('d.m.Y'))->toBe($expected_date);
    }
)->with([
    [
        "28.12 VINMONOPOLET SKI SKI",
        "02.01.2022",
        "28.12.2021",
    ],
]);


it(
    "should use posted_date if no date is found",
    function (string $description, string $posted_date, string $expected_date) {

        // Arrange
        $regex = new DescriptionDateRegex(
            description: $description,
            posted_date: Carbon::createFromFormat('d.m.Y', $posted_date),
        );

        // Act

        // Assert
        expect($regex->date->format('d.m.Y'))->toBe($expected_date);
    }
)->with([
    [
        "There is no date in this description",
        "12.02.2019",
        "12.02.2019",
    ],
    [
        "12.321 is not a valid date",
        "24.04.1973",
        "24.04.1973",
    ],
    [
        "Not a valid date either: 123.123",
        "24.04.1973",
        "24.04.1973",
    ],
]);
