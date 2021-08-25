<?php

namespace Database\Factories;

use App\Models\Link;
use App\Service\LinkService;
use Illuminate\Database\Eloquent\Factories\Factory;

class LinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Link::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'link_source' => $this->faker->url,
            'link_desc' => $this->faker->text(40),
            'link_hash' => app(LinkService::class)->getLinkHashGenerate(),
        ];
    }
}
