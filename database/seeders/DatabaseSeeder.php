<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            AdminSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            PackageSeeder::class,
            UserSeeder::class,
            CitySeeder::class,
            GymSeeder::class,
            BranchSeeder::class,
            GymTimeSeeder::class,
            GymImageSeeder::class,
            GiftUserSeeder::class,
            PackageGymSeeder::class,
            SettingSeeder::class

        ]);
    }
}
