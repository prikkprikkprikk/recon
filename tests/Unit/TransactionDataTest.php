<?php

use App\DTO\TransactionData;
use Illuminate\Support\Carbon;

it(
    'correctly converts itself to an array',
    function($data)
    {
        // Arrange

        $transactionData = new TransactionData(
            new Carbon($data['date']),
            $data['payee'],
            $data['memo'],
            $data['amount'],
            $data['transformed'],
        );

        // Act

        // Assert

        expect($transactionData)
            ->toArray()->toEqual([
                'date' => $data['expectedDate'],
                'payee' => $data['payee'],
                'memo' => $data['memo'],
                'amount' => $data['amount'],
                'transformed' => $data['transformed'],
            ])
        ;
    }
)->with(
    [
        [
            [
                'date' => '02.05.2022',
                'expectedDate' => '2022-05-02',
                'payee' => 'Rema 1000',
                'memo' => 'Dopapir',
                'amount' => '-3490',
                'transformed' => false,
            ],
            [
                'date' => '31.12.2020',
                'expectedDate' => '2020-12-31',
                'payee' => 'Nav',
                'memo' => 'Dagpenger',
                'amount' => '800000',
                'transformed' => true,
            ],
        ],
    ]
);
