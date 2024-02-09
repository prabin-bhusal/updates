<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ->create();

        Event::factory(10)
            ->for(Admin::factory())
            ->create();

        Event::factory(8)
            ->for(User::factory())
            ->create();
    }
}
