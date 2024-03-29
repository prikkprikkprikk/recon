<?php

use App\Services\YnabApi;

it(
    'gets budgets from YNAB',
    function ()
    {
        $ynabApi = app(YnabApi::class);

        $budgets = $ynabApi->budgets();

        expect($budgets->data->budgets)->toBeArray();
    }
);
