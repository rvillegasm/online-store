<?php

use Illuminate\Database\Seeder;
use App\Watch;

class WatchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Watch::class,20)->create();
    }
}

?>