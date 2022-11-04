<?php

use App\DTO\IncomingTransactionData;
use App\Actions\TransformTransaction;
use App\Models\TransactionTransformer;


it(
    'can create a transaction transformer and transform incoming transaction data',
    function ($data) {

        // Arrange

        $incomingTransactionData = IncomingTransactionData::fromExcelRow([
            "bokfort" => $data['bokfort'],
            "rentedato" => $data['rentedato'],
            "tekstkode" => $data['tekstkode'],
            "beskrivelse" => $data['beskrivelse'],
            "ut_av_konto" => $data['ut_av_konto'],
            "inn_pa_konto" => $data['inn_pa_konto'],
            "arkivref" => $data['arkivref'],
            "motkonto" => $data['motkonto'],
        ]);

        $transformers = collect([

            TransactionTransformer::factory([
                'payee' => 'Nordea Finans',
                'description_regex' => '/NORDEA FINANS AS/',
            ])->make(),

            TransactionTransformer::factory([
                'payee' => 'Nav',
                'description_regex' => '/NAV/',
            ])->make(),

            TransactionTransformer::factory([
                'payee' => 'Tibber',
                'description_regex' => '/Strøm/',
            ])->make(),

        ]);

        // Act

        $outgoingTransaction = TransformTransaction::execute($incomingTransactionData, $transformers);

        // Assert

        expect($outgoingTransaction)
            ->payee->toBe($data['expectedPayee'])
            ->date->format('Y-m-d')->toEqual($data['expectedDate'])
            ->amount->toEqual($data['expectedAmount'])
            ->memo->toBe('')
            ->transformed->toBe($data['expectedTransformed'])
        ;

    }
)->with(
    [
        [
            [
                "bokfort" => "02.05.2022",
                "rentedato" => "02.05.2022",
                "tekstkode" => "NO MATCH",
                "beskrivelse" => "No match for this transaction",
                "ut_av_konto" => null,
                "inn_pa_konto" => 200,
                "arkivref" => "",
                "motkonto" => "1234.05.67890",
                "expectedPayee" => "No match for this transaction",
                "expectedDate" => "2022-05-02",
                "expectedAmount" => 20000,
                "expectedTransformed" => false,
            ],
            [
                "bokfort" => "02.05.2022",
                "rentedato" => "02.05.2022",
                "tekstkode" => "E-FAKTURA",
                "beskrivelse" => "Nettgiro til: NORDEA FINANS AS Betalt: 02.05.22",
                "ut_av_konto" => -2195,
                "inn_pa_konto" => null,
                "arkivref" => "50391029343",
                "motkonto" => "6003.05.35238",
                "expectedPayee" => "Nordea Finans",
                "expectedDate" => "2022-05-02",
                "expectedAmount" => -219500,
                "expectedTransformed" => true,
            ],
        ],
    ]
);
