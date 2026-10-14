<?php

namespace Tests\Feature;

use App\Models\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CityTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_lists_cities(): void
    {
        $city = City::factory()->create();

        $this->get(route('cities.index'))
            ->assertOk()
            ->assertSee($city->name);
    }

    public function test_create_page_renders(): void
    {
        $this->get(route('cities.create'))->assertOk();
    }

    public function test_city_can_be_stored(): void
    {
        $response = $this->post(route('cities.store'), [
            'name' => 'Chennai',
            'state' => 'Tamil Nadu',
        ]);

        $city = City::first();
        $response->assertRedirect(route('cities.show', $city));
        $this->assertDatabaseHas('cities', ['name' => 'Chennai', 'state' => 'Tamil Nadu']);
    }

    public function test_store_validates_input(): void
    {
        $this->post(route('cities.store'), [
            'name' => '',
            'state' => str_repeat('a', 256),
        ])->assertSessionHasErrors(['name', 'state']);

        $this->assertDatabaseCount('cities', 0);
    }

    public function test_city_can_be_shown(): void
    {
        $city = City::factory()->create();

        $this->get(route('cities.show', $city))
            ->assertOk()
            ->assertSee($city->state);
    }

    public function test_edit_page_renders(): void
    {
        $city = City::factory()->create();

        $this->get(route('cities.edit', $city))->assertOk();
    }

    public function test_city_can_be_updated(): void
    {
        $city = City::factory()->create();

        $this->put(route('cities.update', $city), [
            'name' => 'Mumbai',
            'state' => 'Maharashtra',
        ])->assertRedirect(route('cities.show', $city));

        $this->assertDatabaseHas('cities', ['id' => $city->id, 'name' => 'Mumbai', 'state' => 'Maharashtra']);
    }

    public function test_city_can_be_deleted(): void
    {
        $city = City::factory()->create();

        $this->delete(route('cities.destroy', $city))
            ->assertRedirect(route('cities.index'));

        $this->assertDatabaseMissing('cities', ['id' => $city->id]);
    }
}
