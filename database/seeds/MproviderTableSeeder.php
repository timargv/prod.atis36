<?php

use Illuminate\Database\Seeder;

class MproviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Mprovider::class, 5000)->create();
    }
}
