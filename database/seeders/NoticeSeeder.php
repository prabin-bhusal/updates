<?php

namespace Database\Seeders;

use App\Models\Notice;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Notice::factory(3)
            ->state(new Sequence(
                ['admin_id' => null],
                // ['user_id' => null],
            ))
            ->create();

        // Notice::factory(2)
        //     ->for(User::factory())
        //     ->create([

        //     ]);

        // Notice::factory(5)
        //     ->for(User::factory())
        //     ->create();
    }
}
