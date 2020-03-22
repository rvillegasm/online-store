<?php

use Illuminate\Database\Seeder;
use App\CustomerDetails;

class CustomerDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CustomerDetails::class, 4)->create();
    }
}
