<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::factory(5)
            ->for(User::factory())
            ->state(new Sequence(
                ['admin_id' => null],
                // ['user_id' => null],
            ))
            ->create();

        Event::factory(10)
            ->for(Admin::factory())
            ->state(new Sequence(
                ['user_id' => null],
                // ['user_id' => null],
            ))
            ->create();
    }
}
