<?php

namespace Database\Seeders;

use App\Models\Master\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
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
                Author::ATTR_CHAR_CODE  => 'AUTH-00001',
                Author::ATTR_CHAR_NAME  => 'William Shakespeare',
                Author::ATTR_INT_GENDER => 1,
                Author::ATTR_CHAR_PHONE => '08123456789',
                Author::ATTR_CHAR_EMAIL => 'william.s@email.com',
            ],
            [
                Author::ATTR_CHAR_CODE  => 'AUTH-00002',
                Author::ATTR_CHAR_NAME  => 'Agatha Christie',
                Author::ATTR_INT_GENDER => 2,
                Author::ATTR_CHAR_PHONE => '08123456799',
                Author::ATTR_CHAR_EMAIL => 'agatha.c@email.com',
            ],
        ];

        foreach ($data as $item)
            Author::firstOrCreate([
                Author::ATTR_CHAR_CODE        => $item[Author::ATTR_CHAR_CODE],
            ], [
                Author::ATTR_CHAR_NAME => $item[Author::ATTR_CHAR_NAME],
            ]);
    }
}
