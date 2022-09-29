<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTransformersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_transformers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('payee');
            $table->text('description_regex');
            $table->text('archival_reference')->nullable();
            $table->text('contra_account')->nullable();
        });
    }

}
