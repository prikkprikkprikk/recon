<?php

namespace App\Imports;

use DateTime;
use App\Models\Transaction;
use Illuminate\Support\Collection;
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
        $sort_order_max = Transaction::max('sort_order');

        $rows = $rows->sort(function($row_a, $row_b){
            $a_posted_date = (DateTime::createFromFormat('d.m.Y', $row_a['bokfort']))->format('Y-m-d');
            $b_posted_date = (DateTime::createFromFormat('d.m.Y', $row_b['bokfort']))->format('Y-m-d');

            if($a_posted_date===$b_posted_date) { return 0; }
            return $a_posted_date < $b_posted_date ? -1 : 1;
        });

        foreach ($rows as $row)
        {
            $posted_date = DateTime::createFromFormat('d.m.Y', $row['bokfort']);
            $interest_date = DateTime::createFromFormat('d.m.Y', $row['rentedato']);
            $amount = ( $row['ut_av_konto'] ?? $row['inn_pa_konto'] ) * 100;

            $values = [
                'posted_date' => $posted_date->format('Y-m-d'),
                'interest_date' => $interest_date->format('Y-m-d'),
                'text_code' => $row['tekstkode'],
                'description' => $row['beskrivelse'],
                'amount' => $amount,
                'archival_reference' => $row['arkivref'],
                'contra_account' => $row['motkonto'],
                'sort_order' => ++$sort_order_max,
            ];

            Transaction::create($values);
        }


    }
}
