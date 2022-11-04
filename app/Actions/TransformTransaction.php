<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTO\IncomingTransactionData;
use App\DTO\TransactionData;
use App\Models\TransactionTransformer;
use Illuminate\Support\Collection;

class TransformTransaction
{
    public static $transformers;

    public static function execute( IncomingTransactionData $incomingTransactionData ) : TransactionData
    {
        // Initialize transformers if null
        if (self::$transformers === null) {
            self::$transformers = TransactionTransformer::all();
        }

        // Execute transformers one by one, return first match
        foreach (self::$transformers as $transformer) {
            if (preg_match($transformer->description_regex, $incomingTransactionData->beskrivelse)) {
                return new TransactionData(
                    $incomingTransactionData->interest_date,
                    $transformer->payee,
                    '',
                    $incomingTransactionData->amount,
                    true,
                );
            }
        }

        // No match, return original data
        return new TransactionData(
            $incomingTransactionData->interest_date,
            $incomingTransactionData->description,
            '',
            $incomingTransactionData->amount,
            false,
        );
    }
}
