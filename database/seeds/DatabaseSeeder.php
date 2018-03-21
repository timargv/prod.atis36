<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(MproviderTableSeeder::class);
      
        $this->call(UserTableSeeder::class);
        $this->call(ProviderTableSeeder::class);

    }
}
