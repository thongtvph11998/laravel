<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
      $faker = FakerFactory::create();
      for($i=0; $i<20;$i++){
          $data=[
            'name'=>$faker->name,
              'image'=>$faker->image,
              'price'=>$faker->numberBetween($min = 100000, $max = 500000) ,
              'quantity'=>$faker->numberBetween($min = 1, $max = 100) ,
              'category_id'=>$faker->randomDigit,
          ];
          DB::table('products')->insert($data);
      }
    }
}
