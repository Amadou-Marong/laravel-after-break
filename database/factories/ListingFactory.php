<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $listingImages = [
            'https://cdn.pixabay.com/photo/2015/09/27/22/36/house-961401_960_720.jpg',
            'https://cdn.pixabay.com/photo/2017/07/08/06/48/sa-rapita-2483668_640.jpg',
            'https://cdn.pixabay.com/photo/2017/06/19/04/06/house-2418106_640.jpg',
            'https://cdn.pixabay.com/photo/2017/06/16/13/40/new-home-2409165_640.jpg',
            'https://cdn.pixabay.com/photo/2017/07/17/00/54/house-2511060_640.jpg',
            'https://cdn.pixabay.com/photo/2017/06/13/22/42/twilight-2400368_640.jpg',
            'https://cdn.pixabay.com/photo/2020/02/01/16/17/architecture-4810652_640.png',
            'https://cdn.pixabay.com/photo/2017/06/16/15/58/luxury-home-2409518_640.jpg',
            'https://cdn.pixabay.com/photo/2017/06/16/13/40/new-home-2409165_640.jpg',
            'https://cdn.pixabay.com/photo/2017/06/19/04/06/house-2418106_640.jpg',
            'https://cdn.pixabay.com/photo/2020/03/21/20/03/real-estate-4955086_640.jpg',
            'https://cdn.pixabay.com/photo/2016/07/25/17/02/new-home-1540871_640.jpg',
            'https://cdn.pixabay.com/photo/2016/09/12/13/26/new-home-1664284_640.jpg'
        ];
        return [
            'beds' => fake()->numberBetween(1, 7),
            'baths' => fake()->numberBetween(1, 7),
            'area' => fake()->numberBetween(30, 400),
            'city' => fake()->city(),
            'code' => fake()->postcode(),
            'street' => fake()->streetName(),
            'street_nr' => fake()->numberBetween(10, 200),
            'price' => fake()->numberBetween(50_000, 2_000_000),
            'listing_image' => $this->faker->randomElement($listingImages),
        ];
    }
}
