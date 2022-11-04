<?php

namespace App\Services;

use GuzzleHttp\Client;
use stdClass;

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
