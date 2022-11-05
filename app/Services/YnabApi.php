<?php

declare(strict_types=1);

namespace App\Services;

use GuzzleHttp\Client;

class YnabApi
{
    public function __construct(
        Client $client
    ){
        $this->client = $client;
    }

    public function getBudgets() : array
    {
        $response = $this->client->get('budgets');

        $budgets = json_decode($response->getBody())->data->budgets;

        return $budgets;
    }
}
