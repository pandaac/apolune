<?php

namespace Perilune\Resources\Seeds;

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
        if (DB::table('guilds')->first()) {
            return null;
        }

        $owner = app('player')->orderByRaw('RAND()')->first();

        $guild = app('guild');
        $guild->world_id        = $owner->world()->id();
        $guild->name            = 'Some Random Guild';
        $guild->ownerid         = $owner->id();
        $guild->creationdata    = time();
        $guild->save();

        $players = app('player')->fromWorld($owner->world())->where('id', '!=', $owner->id())->take(rand(1, 10))->get();

        foreach ($players as $player) {
            $member = app('guild.member');
            $member->guild_id   = $guild->id();
            $member->player_id  = $player->id();
            $member->rank_id    = $guild->ranks->random()->id();
            $member->save();
        }
    }
}
