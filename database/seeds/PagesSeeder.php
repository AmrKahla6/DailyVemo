<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Page;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 2; $i++) {
            $array = [
                'name'          => $faker->word,
                'des'           => $faker->paragraph,
                'meta_des'      => $faker->name,
                'meta_keywords' => $faker->name,
            ];
            $video = Page::create($array);
    }
}
}
