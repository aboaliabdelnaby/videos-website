<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class Tags extends Seeder
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


            ];
            \App\Models\Tag::create($array);
    }
    }
}
