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

    public function budgets() : array
    {
        $response = $this->client->get('budgets');

        $budgets = json_decode($response->getBody()->getContents())->data->budgets;

        return $budgets;
    }
}
