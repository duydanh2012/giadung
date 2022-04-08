<?php

namespace Database\Seeders;

use Platform\Base\Supports\BaseSeeder;
use Platform\CoreProduct\Models\CoreProduct;

class FeaturedInSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->uploadFiles('featured-in');
        CoreProduct::where('type', 'featured-in')->delete();

        $nameFeaturedIn = [
            'Blockonomi',
            'Coinmarketcap',
            'Coinmarketcap',
            'Morningstar',
            'Nasdaq',
            'NFT Evening',
            'Seeking Alpha',
            'Variety',
            'WSJ Long Form',
            'WSJ',         
        ];

        for($i = 1; $i <= 10; $i++){
            CoreProduct::create([
                'name'  => $nameFeaturedIn[$i-1],
                'image' => 'featured-in/' . $i . '.png',
                'type'  => 'featured-in',
            ]);
        }
    }
}
