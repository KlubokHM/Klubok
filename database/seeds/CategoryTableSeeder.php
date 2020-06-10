<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 9,
                'name' => 'утварь-1',
                'slug' => Str::random(6).'_ytvar' ,
                'institution_id'=>2

            ],
            [
                'id' =>10,
                'name' => 'одежда-1',
                'slug' => Str::random(6).'_odegda',
                'institution_id'=>2

            ],
            [
                'id' => 11,
                'name' => 'игрушки-1',
                'slug' => Str::random(6).'_games',
                'institution_id'=>2

            ],
            [
                'id' =>12,
                'name' => 'этнические музыкальные инструменты-1',
                'slug' => Str::random(6).'_music',
                'institution_id'=>2

            ],
            [
                'id' => 13,
                'name' => 'швейные принадлежности-1',
                'slug' => Str::random(6).'_shveia',
                'institution_id'=>2

            ],
            [
                'id' => 14,
                'name' => 'этнические украшения-1',
                'slug' => Str::random(6).'_ukrashenia',
                'institution_id'=>2

            ],
            [
                'id' => 15,
                'name' => 'орудия промысловой деятельности-1',
                'slug' => Str::random(6).'_work_guns',
                'institution_id'=>2

            ],
            [
                'id' => 16,
                'name' => 'ритуальные предметы-1',
                'slug' => Str::random(6).'_ritual',
                'institution_id'=>2

            ],

        ];













            

        DB::table('categories')->insert($data);
    }
}
