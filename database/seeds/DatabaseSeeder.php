<?php
use Carbon\Carbon;

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
         $this->call([
           MproviderTableSeeder::class,
        //   ProductTableSeeder::class,
        //   UserTableSeeder::class,
           ProviderTableSeeder::class,
         ]);

        // DB::table('users')->insert([
        //     [
        //       'name' => str_random(10),
        //       'email' => str_random(10).'@gmail.com',
        //       'password' => bcrypt('secret'),
        //
        //     ],
        //     [
        //       'name' => str_random(10),
        //       'email' => str_random(10).'@gmail.com',
        //       'password' => bcrypt('secret'),
        //
        //     ],
        //     [
        //       'name' => str_random(10),
        //       'email' => str_random(10).'@gmail.com',
        //       'password' => bcrypt('secret'),
        //
        //     ]
        //
        // ]);


//        DB::table('products')->insert([
//          'title' => 'asdasdsa',
//          'num' => '5456',
//          'site' => 'http://atis36.ru',
//          'prc' => '1233',
//          'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
//          'image' => '',
//          'category_id' => '0',
//          'provider_id' => '0',
//          'status' => 1,
//          'slug' => 'sadasd',
//          'date' => Carbon::create('2000', '01', '01')
//        ]);

    }
}
