<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Item;
use App\Models\Question;
use App\Models\User;
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
        // Usuario 1
        $user = new User();

        $user->name = "CJORDAN";
        $user->email = "cjordan@gmail.com";
        $user->password = '$2y$10$a5nMHBI/yeclrkIkgxQSse/q0VxHz.cb6roCTrsMoD4CTI0T48EAe';

        $user->save();

        // Usuario 2
        $user = new User();

        $user->name = "MGASCON";
        $user->email = "mgascon@gmail.com";
        $user->password = '$2y$10$a5nMHBI/yeclrkIkgxQSse/q0VxHz.cb6roCTrsMoD4CTI0T48EAe';

        $user->save();

        Question::factory()
            ->count(10)
            ->has(Item::factory()->state(['user_id' => 1])->count(10))
            ->create(['user_id' => 1]);

        Question::factory()
            ->count(10)
            ->has(Item::factory()->state(['user_id' => 2])->count(10))
            ->create(['user_id' => 2]);
    }
}
