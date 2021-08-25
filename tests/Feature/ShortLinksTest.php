<?php

namespace Tests\Feature;

use App\Models\Link;
use App\Service\LinkService;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class ShortLinksTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_form_link_generate()
    {
        $response = $this->get('/links');

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_send_form_link_generate()
    {
        $hash = app(LinkService::class)->getLinkHashGenerate();
        $faker = Factory::create('en_EN');
        $response = $this->from('/links')->post('/links', [
            'link_source' => $faker->url,
            'link_desc' => $faker->text(40),
            'link_hash' => $hash,
        ])
            ->assertRedirect('/links')
            ->assertStatus(Response::HTTP_FOUND);
    }
}
