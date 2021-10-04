<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;
class CateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = FakerFactory::create();
      for($i=0; $i<5;$i++){
          $data=[
              'name'=>$faker->name,
          ];
          DB::table('categories')->insert($data);
      }
    }
}
