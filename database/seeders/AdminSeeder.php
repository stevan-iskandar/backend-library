<?php

namespace Database\Seeders;

use App\Models\Master\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
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
                Admin::ATTR_CHAR_CODE       => 'ADM-00001',
                Admin::ATTR_CHAR_NAME       => 'Super Admin',
                Admin::ATTR_CHAR_USERNAME   => 'superadmin',
                Admin::ATTR_INT_GENDER      => 1,
                Admin::ATTR_CHAR_PHONE      => '08123456789',
                Admin::ATTR_CHAR_EMAIL      => 'superadmin1@email.com',
                Admin::ATTR_CHAR_PASSWORD   => Hash::make('superadmin@library'),
                Admin::ATTR_CHAR_TOKEN      => null,
                Admin::ATTR_INT_ROLE        => 1,
            ],
            [
                Admin::ATTR_CHAR_CODE       => 'ADM-00002',
                Admin::ATTR_CHAR_NAME       => 'Admin',
                Admin::ATTR_CHAR_USERNAME   => 'admin',
                Admin::ATTR_INT_GENDER      => 1,
                Admin::ATTR_CHAR_PHONE      => '08123456789',
                Admin::ATTR_CHAR_EMAIL      => 'admin1@email.com',
                Admin::ATTR_CHAR_PASSWORD   => Hash::make('admin@library'),
                Admin::ATTR_CHAR_TOKEN      => null,
                Admin::ATTR_INT_ROLE        => 2,
            ],
        ];

        foreach ($data as $item)
            Admin::firstOrCreate([
                Admin::ATTR_CHAR_CODE       => $item[Admin::ATTR_CHAR_CODE],
            ], [
                Admin::ATTR_CHAR_NAME       => $item[Admin::ATTR_CHAR_NAME],
                Admin::ATTR_CHAR_USERNAME   => $item[Admin::ATTR_CHAR_USERNAME],
                Admin::ATTR_INT_GENDER      => $item[Admin::ATTR_INT_GENDER],
                Admin::ATTR_CHAR_PHONE      => $item[Admin::ATTR_CHAR_PHONE],
                Admin::ATTR_CHAR_EMAIL      => $item[Admin::ATTR_CHAR_EMAIL],
                Admin::ATTR_CHAR_PASSWORD   => $item[Admin::ATTR_CHAR_PASSWORD],
                Admin::ATTR_CHAR_TOKEN      => $item[Admin::ATTR_CHAR_TOKEN],
                Admin::ATTR_INT_ROLE        => $item[Admin::ATTR_INT_ROLE],
            ]);
    }
}
