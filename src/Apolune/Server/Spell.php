<?php

namespace Apolune\Server;

use Apolune\Contracts\Server\Spell as Contract;

class Spell implements Contract
{
    /**
     * Holds the spell name.
     *
     * @var string
     */
    protected $name;

    /**
     * Holds the spell type.
     *
     * @var string
     */
    protected $type;

    /**
     * Holds the original data.
     *
     * @var array
     */
    protected $data;

    /**
     * Create a new spell instance.
     *
     * @param  string  $name
     * @param  string  $type
     * @param  array  $spell
     * @return void
     */
    public function __construct($name, $type, array $spell)
    {
        $this->name = $name;
        $this->type = $type;
        $this->data = $spell;
    }

    /**
     * Get the spell name.
     *
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * Get the spell slug.
     *
     * @return string
     */
    public function slug()
    {
        return $this->data['slug'];
    }

    /**
     * Get the spell description.
     *
     * @return string
     */
    public function description()
    {
        return isset($this->data['description']) ? $this->data['description'] : null;
    }

    /**
     * Get the spell type.
     *
     * @return string
     */
    public function type()
    {
        return ucwords(strtolower($this->type));
    }

    /**
     * Get the spell words.
     *
     * @return string
     */
    public function words()
    {
        return strtolower($this->data['words']);
    }

    /**
     * Get the spell level.
     *
     * @return integer
     */
    public function level()
    {
        return $this->data['level'];
    }

    /**
     * Get the spell mana requirements.
     *
     * @return integer
     */
    public function mana()
    {
        return $this->data['mana'];
    }

    /**
     * Get the spells availability.
     *
     * @return boolean
     */
    public function premium()
    {
        return $this->data['premium'];
    }

    /**
     * Get the spell group.
     *
     * @return string
     */
    public function group()
    {
        return ucwords(strtolower($this->data['group'] ?: 'support'));
    }

    /**
     * Get the spell vocations.
     *
     * @return array
     */
    public function vocations()
    {
        return isset($this->data['vocations']) ? $this->data['vocations'] : [];
    }

    /**
     * Determinate if hidden or not.
     *
     * @return boolean
     */
    public function hidden()
    {
        return $this->data['hidden'];
    }
}
