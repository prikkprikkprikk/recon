<?php

namespace App\Models;

use App\DTO\TransactionData;
use App\DTO\IncomingTransactionData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionTransformer extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected string $payee;
    protected string $description_regex;
    protected string $archival_reference;
    protected string $contra_account;
}
