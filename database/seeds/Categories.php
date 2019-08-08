<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=Faker::create();
        $array=[];
        for($i=0;$i<10;$i++){
            $array=[
                'name'=>$faker->word,
                'meta_des'=>$faker->name,
                'meta_keywords'=>$faker->name

            ];
            \App\Models\Category::create($array);
        }
    }
}
