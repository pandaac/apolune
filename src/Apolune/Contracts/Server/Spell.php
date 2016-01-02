<?php

namespace Apolune\Contracts\Server;

interface Spell
{
    /**
     * Create a new spell instance.
     *
     * @param  string  $name
     * @param  string  $type
     * @param  array  $spell
     * @return void
     */
    public function __construct($name, $type, array $spell);

    /**
     * Get the spell name.
     *
     * @return string
     */
    public function name();

    /**
     * Get the spell slug.
     *
     * @return string
     */
    public function slug();

    /**
     * Get the spell description.
     *
     * @return string
     */
    public function description();

    /**
     * Get the spell type.
     *
     * @return string
     */
    public function type();

    /**
     * Get the spell words.
     *
     * @return string
     */
    public function words();

    /**
     * Get the spell level.
     *
     * @return integer
     */
    public function level();

    /**
     * Get the spell mana requirements.
     *
     * @return integer
     */
    public function mana();

    /**
     * Get the spells availability.
     *
     * @return boolean
     */
    public function premium();

    /**
     * Get the spell group.
     *
     * @return string
     */
    public function group();

    /**
     * Get the spell vocations.
     *
     * @return array
     */
    public function vocations();

    /**
     * Determinate if hidden or not.
     *
     * @return boolean
     */
    public function hidden();
}
