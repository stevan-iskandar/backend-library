<?php

namespace Database\Seeders;

use App\Models\Master\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                User::ATTR_CHAR_CODE       => 'USR-00001',
                User::ATTR_CHAR_NAME       => 'User 1',
                User::ATTR_CHAR_USERNAME   => 'user1',
                User::ATTR_INT_GENDER      => 1,
                User::ATTR_CHAR_PHONE      => '08123456789',
                User::ATTR_CHAR_EMAIL      => 'user1@email.com',
                User::ATTR_CHAR_PASSWORD   => Hash::make('user1@library'),
                User::ATTR_CHAR_TOKEN      => null,
            ],
            [
                User::ATTR_CHAR_CODE       => 'USR-00002',
                User::ATTR_CHAR_NAME       => 'User 2',
                User::ATTR_CHAR_USERNAME   => 'user2',
                User::ATTR_INT_GENDER      => 1,
                User::ATTR_CHAR_PHONE      => '08123456789',
                User::ATTR_CHAR_EMAIL      => 'user2@email.com',
                User::ATTR_CHAR_PASSWORD   => Hash::make('user2@library'),
                User::ATTR_CHAR_TOKEN      => null,
            ],
        ];

        foreach ($data as $item)
            User::firstOrCreate([
                User::ATTR_CHAR_CODE       => $item[User::ATTR_CHAR_CODE],
            ], [
                User::ATTR_CHAR_NAME       => $item[User::ATTR_CHAR_NAME],
                User::ATTR_CHAR_USERNAME   => $item[User::ATTR_CHAR_USERNAME],
                User::ATTR_INT_GENDER      => $item[User::ATTR_INT_GENDER],
                User::ATTR_CHAR_PHONE      => $item[User::ATTR_CHAR_PHONE],
                User::ATTR_CHAR_EMAIL      => $item[User::ATTR_CHAR_EMAIL],
                User::ATTR_CHAR_PASSWORD   => $item[User::ATTR_CHAR_PASSWORD],
                User::ATTR_CHAR_TOKEN      => $item[User::ATTR_CHAR_TOKEN],
            ]);
    }
}
