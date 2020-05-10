<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** factory(Category::class,5)->create(); */
        Category::create([
            'name' => 'Smart',
            'image' => 'watch/w1.jpg',
            'description' => 'Up your fitness game, connect to your favourite apps, and keep on top of social media – all from your wrist.',
        ]);
        Category::create([
            'name' => 'Sports',
            'image' => 'watch/w2.jpg',
            'description' => 'Give your sports training a boost with our collection of men’s and women’s sports watches.',
        ]);
        Category::create([
            'name' => 'Digital',
            'image' => 'watch/w3.jpg',
            'description' => 'Digital watches are an ideal choice if you want a highly functional timepiece that can be used for sporty activities as well as for everyday use.',
        ]);
        Category::create([
            'name' => 'Waterproof',
            'image' => 'watch/w4.jpg',
            'description' => 'Waterproof watches are a great choice if you enjoy water sports, swimming, sailing, or if you simply want a watch that can survive extremely wet conditions.',
        ]);
        Category::create([
            'name' => 'Kids',
            'image' => 'watch/w5.jpg',
            'description' => 'Whether you are teaching your child to tell the time, looking for a special childrens first watch.',
        ]);
    }
}

?>