<?php

namespace App\Imports;

use Illuminate\Support\Carbon;
use App\Models\Transaction;
use Illuminate\Support\Collection;
use App\DTO\IncomingTransactionData;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactionsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $sort_order_max = Transaction::max('sort_order') ?? 0;

        $rows = $rows->sort(
            function($row_a, $row_b)
            {
                $a_posted_date = (Carbon::createFromFormat('d.m.Y', $row_a['bokfort']))->format('Y-m-d');
                $b_posted_date = (Carbon::createFromFormat('d.m.Y', $row_b['bokfort']))->format('Y-m-d');

                if($a_posted_date===$b_posted_date)
                {
                    return 0;
                }

                return $a_posted_date < $b_posted_date ? -1 : 1;
            }
        );

        foreach ($rows as $row)
        {
            $incomingTransactionData = IncomingTransactionData::fromExcelRow($row);

            Transaction::create($incomingTransactionData->toArray() + [
                'sort_order' => $sort_order_max++,
            ]);
        }
    }
}
