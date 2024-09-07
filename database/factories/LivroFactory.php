<?php

namespace Database\Factories;

use App\Models\Livro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livro>
 */
class LivroFactory extends Factory
{
    /**
     *
     * @var string
     */
    protected $model = Livro::class;

    /**
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'editora' => $this->faker->company(),
            'edicao' => $this->faker->numberBetween(1, 10),
            'ano_publicacao' => $this->faker->year()
        ];
    }
}
