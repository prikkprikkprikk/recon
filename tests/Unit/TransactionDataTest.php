<?php

use App\DTO\TransactionData;
use Illuminate\Support\Carbon;

it(
    'correctly converts itself to an array',
    function($data)
    {
        // Arrange

        ray($data);

        $transactionData = new TransactionData(
            new Carbon($data['date']),
            $data['payee'],
            $data['memo'],
            $data['amount']
        );

        // Act

        // Assert

        expect($transactionData)
            ->toArray()->toEqual([
                'date' => '2022-05-02',
                'payee' => $data['payee'],
                'memo' => $data['memo'],
                'amount' => $data['amount'],
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
                'amount' => '3490',
            ],
        ],
    ]
);
