<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class FakeGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::factory()->count(5)->create();
    }
}
