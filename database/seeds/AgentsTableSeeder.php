<?php

use App\User;
use Illuminate\Database\Seeder;

class AgentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Agent::class, 50)->create()->each(function($agent) {
            $user = User::inRandomOrder()->first();
            $agent->user()->associate($user)->save();
        });
    }
}
