<?php

namespace Apolune\Guilds\Resources\Seeds;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class GuildsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guilds = app('guild')->doesntHave('properties')->get();

        foreach ($guilds as $guild) {
            $guild->properties()->create([
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
