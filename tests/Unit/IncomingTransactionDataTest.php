<?php

use App\DTO\IncomingTransactionData;

it('should return an IncomingTransactionData object with expected values', function ($incomingData) {

    $incomingTransactionData = IncomingTransactionData::fromExcelRow(
        $incomingData
    );

    expect($incomingTransactionData)->toBeInstanceOf(IncomingTransactionData::class);
    expect($incomingTransactionData->date->format('d.m.Y'))->toBe($incomingData['bokfort']);
    expect($incomingTransactionData->description)->toBe($incomingData['beskrivelse']);
    expect($incomingTransactionData->amount)->toBe(($incomingData['ut_av_konto'] ?? $incomingData['inn_pa_konto']) * 100);

})->with(
    [
        [
            [
                "bokfort" => "02.05.2022",
                "rentedato" => "02.05.2022",
                "tekstkode" => "E-FAKTURA",
                "beskrivelse" => "Nettgiro til: NORDEA FINANS AS Betalt: 02.05.22",
                "ut_av_konto" => -2195,
                "inn_pa_konto" => null,
                "arkivref" => "50391029343",
                "motkonto" => "6003.05.35238",
            ]
        ],
        [
            [
                "bokfort" => "03.05.2022",
                "rentedato" => "04.05.2022",
                "tekstkode" => "TRYGD/STØ",
                "beskrivelse" => "Fra NAV",
                "ut_av_konto" => null,
                "inn_pa_konto" => 8224,
                "arkivref" => "50667610857",
                "motkonto" => "6345.05.30877",
            ]
        ],
    ]
);
