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
                'id' => '1',
                'name' => 'утварь',
                'slug' => Str::random(6).'_ytvar' ,

            ],
            [
                'id' => '2',
                'name' => 'одежда',
                'slug' => Str::random(6).'_odegda',

            ],
            [
                'id' => '3',
                'name' => 'игрушки',
                'slug' => Str::random(6).'_games',

            ],
            [
                'id' => '4',
                'name' => 'этнические музыкальные инструменты',
                'slug' => Str::random(6).'_music',

            ],
            [
                'id' => '5',
                'name' => 'швейные принадлежности',
                'slug' => Str::random(6).'_shveia',

            ],
            [
                'id' => '6',
                'name' => 'этнические украшения',
                'slug' => Str::random(6).'_ukrashenia',

            ],
            [
                'id' => '7',
                'name' => 'орудия промысловой деятельности',
                'slug' => Str::random(6).'_work_guns',

            ],
            [
                'id' => '8',
                'name' => 'ритуальные предметы',
                'slug' => Str::random(6).'_ritual',

            ],

        ];

        DB::table('categories')->insert($data);
    }
}
