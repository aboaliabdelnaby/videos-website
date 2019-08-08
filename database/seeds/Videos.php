<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class Videos extends Seeder
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
        $youtube=[
            'https://www.youtube.com/watch?v=L4-C1wiAgfs&list=PLYp_Kd32XvcqW5GIocnA-M3DKUK6_7aDa&index=2&t=0s',
             'https://www.youtube.com/watch?v=mYkgPHBHNCA',
            'https://www.youtube.com/watch?v=J8FRwzBNWio',
            'https://www.youtube.com/watch?v=Zsx8DLpNwEk'
        ];
        $image=[
            '1564650865DXFn8bNxP5.jpg',
            '1564172719UoCtqMBryl.jpg',
            '1564650800kfdRTtLC7j.jpg',
            '1564174589yQ3LE9XAgq.jpg',
            '15641745689psFZpGTEQ.jpg'
        ];
        $ids=[1,2,3,4,5,6,7,8,9];
        for($i=0;$i<10;$i++){
            $array=[
                'name'=>$faker->word,
                'meta_des'=>$faker->name,
                'meta_keywords'=>$faker->name,
                'cat_id'=>$ids[rand(0,8)],
                'youtube'=>$youtube[rand(0,3)],
                'published'=>rand(0,1),
                'image'=>$image[rand(0,4)],
                'des'=>$faker->paragraph,
                'user_id'=>1



            ];
            $video=\App\Models\Video::create($array);
            $video->skills()->sync(array_rand($ids,2));
            $video->tags()->sync(array_rand($ids,2));
    }}
}
