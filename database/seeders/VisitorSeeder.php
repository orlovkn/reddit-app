<?php

namespace Database\Seeders;

use App\Models\Visitor;
use App\Models\Website;
use Illuminate\Database\Seeder;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Website::factory(100)->has(Visitor::factory()->count(100))->create();
    }
}
