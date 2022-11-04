<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\TransactionTransformer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionTransformerFactory extends Factory
{
    protected $model = TransactionTransformer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payee' => $this->faker->word(),
            'description_regex' => "/foo/",
            'archival_reference' => null,
            'contra_account' => null,
        ];
    }
}
