<?php

namespace Apolune\Library\Http\Controllers;

use Apolune\Contracts\Server\Creature;
use Apolune\Core\Http\Controllers\Controller;

class CreatureController extends Controller
{
    /**
     * Show the creatures page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creatures = creatures();
  
        return view('theme::library.creatures.index', compact('creatures'));
    }

    /**
     * Show the a specific creature.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $creature = creature_by_slug($slug);

        if (! $creature) {
            return abort(404);
        }

        $previous = $this->previousCreature($creature);

        $next = $this->nextCreature($creature);
  
        return view('theme::library.creatures.show', compact('creature', 'previous', 'next'));
    }

    /**
     * Retrieve the previous creature.
     *
     * @param  \Apolune\Contracts\Server\Creature  $current
     * @return \Apolune\Contracts\Server\Creature|null
     */
    protected function previousCreature(Creature $current)
    {
        $result = null;

        creatures()->each(function ($creature) use (&$result, $current) {
            if ($creature->slug() === $current->slug()) {
                return false;
            }

            $result = $creature;
        });

        return $result;
    }

    /**
     * Retrieve the next creature.
     *
     * @param  \Apolune\Contracts\Server\Creature  $current
     * @return \Apolune\Contracts\Server\Creature|null
     */
    protected function nextCreature(Creature $current)
    {
        $result = null;
        $creatures = creatures();

        $creatures->each(function ($creature) use (&$result, $current) {
            if (! is_null($result)) {
                $result = $creature;

                return false;
            }

            if ($creature->slug() === $current->slug()) {
                $result = $creature;
            }
        });

        return $current->slug() === $creatures->last()->slug() ? null : $result;
    }
}
