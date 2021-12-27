<?php

namespace Database\Seeders;

use App\Models\Master\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                Category::ATTR_CHAR_NAME        => 'Action',
                Category::ATTR_TEXT_DESCRIPTION => 'Action fiction is a form of genre fiction whose subject matter is characterized by emphasis on exciting action sequences.',
            ],
            [
                Category::ATTR_CHAR_NAME        => 'Horror',
                Category::ATTR_TEXT_DESCRIPTION => 'Horror is the one of the largest genres of speculative fiction which is intended to frighten, scare, or disgust.',
            ],
        ];

        foreach ($data as $item)
            Category::firstOrCreate([
                Category::ATTR_CHAR_NAME        => $item[Category::ATTR_CHAR_NAME],
            ], [
                Category::ATTR_TEXT_DESCRIPTION => $item[Category::ATTR_TEXT_DESCRIPTION],
            ]);
    }
}
