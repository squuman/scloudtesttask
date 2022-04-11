<?php

use App\News;
use Illuminate\Database\Seeder;

class NewsPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i <= 1000; $i++) {
            News::create([
                'title' => $faker->word,
                'content' => $faker->text
            ]);
        }
    }
}
