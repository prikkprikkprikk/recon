<?php

use App\Models\Transaction;
use App\Http\Controllers\TransactionController;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it("throws an exception if file not found",
    function()
    {
        // Arrange
        $path = 'not_found.xls';
        $transactionController = new TransactionController();

        // Act

        // Assert
        expect(function() use ($path, $transactionController) {
            $transactionController->import($path);
        })->toThrow(\Exception::class);
    }
);

it("successfully imports an Excel file",
    function()
    {
        // Arrange
        $path = 'transactions/lønnskonto-2022-05.xls';
        $transactionController = new TransactionController();

        // Act
        $transactionController->import($path);

        // Assert
        expect(Transaction::count())
            ->toBe(95);
    }
);
