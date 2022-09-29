<?php

use App\DTO\IncomingTransactionData;
use App\Models\TransactionTransformer;

use Illuminate\Foundation\Testing\RefreshDatabase;

it(
    'can create a transaction transformer and transform incoming transaction data',
    function () {

        // Arrange

        $incomingTransactionData = IncomingTransactionData::fromExcelRow([
            "bokfort" => "02.05.2022",
            "rentedato" => "02.05.2022",
            "tekstkode" => "E-FAKTURA",
            "beskrivelse" => "Nettgiro til: NORDEA FINANS AS Betalt: 02.05.22",
            "ut_av_konto" => -2195,
            "inn_pa_konto" => null,
            "arkivref" => "50391029343",
            "motkonto" => "6003.05.35238",
        ]);

        $transactionTransformer = TransactionTransformer::factory([
            'payee' => 'Nordea Finans',
            'description_regex' => '/NORDEA FINANS AS/',
        ])->create();

        // Act

        $outgoingTransaction = $transactionTransformer->run($incomingTransactionData);

        // Assert

        expect($outgoingTransaction)
            ->payee->toBe('Nordea Finans')
            ->date->format('Y-m-d')->toEqual('2022-05-02')
            ->amount->toEqual(-219500)
            ->memo->toBe('')
        ;

    }
);
