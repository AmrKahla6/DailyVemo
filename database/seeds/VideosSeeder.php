<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Video;

class VideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $images = [
            '1603384164ZKM8940gFM.png',
            '1603144492MiJUfeJLOt.png',
            '1603145566fe4xqFxLiw.png',
            '1603455992mSQlsE8niv.png',
            '1603455679tYcySbtops.png'
        ];
        $youtubes = [
            'https://www.youtube.com/watch?v=dW4WhJZB99U',
            'https://www.youtube.com/watch?v=pc5MzkyMMFs',
            'https://www.youtube.com/watch?v=HNY6zYx8nnc',
            'https://www.youtube.com/watch?v=BxxzErsWxIE',
            'https://www.youtube.com/watch?v=asT1a9jPj3Q',
        ];

        $ids = [1,2,3,4,5,6,7,8,9];


        for ($i=0; $i < 10; $i++) {
            $array = [
                'name'          => $faker->word,
                'meta_keywords' => $faker->name,
                'meta_des'      => $faker->name,
                'des'           => $faker->paragraph,
                'cat_id'        => $ids[rand(0,8)],
                'youtube'       => $youtubes[rand(0,4)],
                'published'     => rand(0,1),
                'image'         => $images[rand(0,4)],
                'user_id'       => 1,
            ];
            $video = Video::create($array);

            $video->skills()->sync(array_rand($ids , 2));

            $video->tags()->sync(array_rand($ids , 2));
        }
    }
}
