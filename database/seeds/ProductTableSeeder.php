<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
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
                'id' => 1,
                'categories_id' => 1,
                'name' => Str::random(10),
                'slug'=> Str::random(10),
                'sub_name' => Str::random(10),
                'price' =>400,
                'description'=> Str::random(100),
            ],
            [
                'id' => 2,
                'categories_id' => 3,
                'name' => Str::random(10),
                'slug'=> Str::random(10),
                'sub_name' => Str::random(10),
                'price' =>401,
                'description'=> Str::random(100),
            ],
            [
                'id' => 3,
                'categories_id' => 1,
                'name' => Str::random(10),
                'slug'=> Str::random(10),
                'sub_name' => Str::random(10),
                'price' =>402,
                'description'=> Str::random(100),
            ],
            [
                'id' => 4,
                'categories_id' => 4,
                'name' => Str::random(10),
                'slug'=> Str::random(10),
                'sub_name' => Str::random(10),
                'price' =>403,
                'description'=> Str::random(100),
            ],
            [
                'id' => 5,
                'categories_id' => 3,
                'name' => Str::random(10),
                'slug'=> Str::random(10),
                'sub_name' => Str::random(10),
                'price' =>404,
                'description'=> Str::random(100),
            ],
            [
                'id' => 7,
                'categories_id' => 1,
                'name' => Str::random(10),
                'slug'=> Str::random(10),
                'sub_name' => Str::random(10),
                'price' =>405,
                'description'=> Str::random(100),
            ],
            [
                'id' => 8,
                'categories_id' => 2,
                'name' => Str::random(10),
                'slug'=> Str::random(10),
                'sub_name' => Str::random(10),
                'price' =>406,
                'description'=> Str::random(100),
            ],
            [
                'id' => 9,
                'categories_id' => 1,
                'name' => Str::random(10),
                'slug'=> Str::random(10),
                'sub_name' => Str::random(10),
                'price' =>407,
                'description'=> Str::random(100),
            ],

        ];
        DB::table('products')->insert($data);
    }
}
