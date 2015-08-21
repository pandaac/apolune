<?php

namespace Apolune\Contracts\Account;

interface Player
{
    /**
     * Retrieve the associated account.
     *
     * @return \Apolune\Contracts\Account\Account
     */
    public function account();

    /**
     * Retrieve the player properties.
     *
     * @return \Apolune\Contracts\Account\PlayerProperties
     */
    public function properties();

    /**
     * Retrieve the player ID.
     *
     * @return integer
     */
    public function id();

    /**
     * Retrieve the player name.
     *
     * @return string
     */
    public function name();

    /**
     * Retrieve the player group.
     *
     * @return integer
     */
    public function group();

    /**
     * Retrieve the player level.
     *
     * @return integer
     */
    public function level();

    /**
     * Retrieve the player vocation.
     *
     * @return \Apolune\Contracts\Server\Vocation
     */
    public function vocation();

    /**
     * Retrieve the player health.
     *
     * @return integer
     */
    public function health();

    /**
     * Retrieve the player max health.
     *
     * @return integer
     */
    public function maxHealth();

    /**
     * Retrieve the player experience.
     *
     * @return integer
     */
    public function experience();

    /**
     * Retrieve the player lookbody.
     *
     * @return integer
     */
    public function lookBody();

    /**
     * Retrieve the player lookfeet.
     *
     * @return integer
     */
    public function lookFeet();

    /**
     * Retrieve the player lookhead.
     *
     * @return integer
     */
    public function lookHead();

    /**
     * Retrieve the player looklegs.
     *
     * @return integer
     */
    public function lookLegs();

    /**
     * Retrieve the player looktype.
     *
     * @return integer
     */
    public function lookType();

    /**
     * Retrieve the player lookaddons.
     *
     * @return integer
     */
    public function lookAddons();

    /**
     * Retrieve the player magic level.
     *
     * @return integer
     */
    public function magicLevel();

    /**
     * Retrieve the player mana.
     *
     * @return integer
     */
    public function mana();

    /**
     * Retrieve the player max mana.
     *
     * @return integer
     */
    public function maxMana();

    /**
     * Retrieve the player mana spent.
     *
     * @return integer
     */
    public function manaSpent();

    /**
     * Retrieve the player soul points.
     *
     * @return integer
     */
    public function soul();

    /**
     * Retrieve the player town.
     *
     * @return \Apolune\Contracts\Server\Town
     */
    public function town();

    /**
     * Retrieve the player position.
     *
     * @return array
     */
    public function position();

    /**
     * Retrieve the player conditions.
     *
     * @return null
     */
    public function conditions();

    /**
     * Retrieve the player capacity.
     *
     * @return integer
     */
    public function capacity();

    /**
     * Retrieve the player gender.
     *
     * @return \Apolune\Contracts\Server\Gender
     */
    public function gender();

    /**
     * Retrieve the player last login.
     *
     * @return \Carbon\Carbon
     */
    public function lastLogin();

    /**
     * Retrieve the player save status.
     *
     * @return integer
     */
    public function saveStatus();

    /**
     * Retrieve the player skull.
     *
     * @return integer
     */
    public function skull();

    /**
     * Retrieve the player skull time.
     *
     * @return integer
     */
    public function skullTime();

    /**
     * Retrieve the player last logout.
     *
     * @return \Carbon\Carbon
     */
    public function lastLogout();

    /**
     * Retrieve the player blessings.
     *
     * @return integer
     */
    public function blessings();

    /**
     * Retrieve the player online time.
     *
     * @return integer
     */
    public function onlineTime();

    /**
     * Retrieve the player deletion.
     *
     * @return integer
     */
    public function deletion();

    /**
     * Retrieve the player balance.
     *
     * @return integer
     */
    public function balance();

    /**
     * Retrieve the player offline-training time.
     *
     * @return integer
     */
    public function offlinetrainingTime();

    /**
     * Retrieve the player offline-training skill.
     *
     * @return integer
     */
    public function offlinetrainingSkill();

    /**
     * Retrieve the player stamina.
     *
     * @return integer
     */
    public function stamina();

    /**
     * Retrieve the player fist fighting.
     *
     * @return integer
     */
    public function fist();

    /**
     * Retrieve the player fist fighting tries.
     *
     * @return integer
     */
    public function fistTries();

    /**
     * Retrieve the player club fighting.
     *
     * @return integer
     */
    public function club();

    /**
     * Retrieve the player club fighting tries.
     *
     * @return integer
     */
    public function clubTries();

    /**
     * Retrieve the player sword fighting.
     *
     * @return integer
     */
    public function sword();

    /**
     * Retrieve the player sword fighting tries.
     *
     * @return integer
     */
    public function swordTries();

    /**
     * Retrieve the player axe fighting.
     *
     * @return integer
     */
    public function axe();

    /**
     * Retrieve the player axe fighting tries.
     *
     * @return integer
     */
    public function axeTries();

    /**
     * Retrieve the player distance fighting.
     *
     * @return integer
     */
    public function distance();

    /**
     * Retrieve the player distance fighting tries.
     *
     * @return integer
     */
    public function distanceTries();

    /**
     * Retrieve the player shielding skill.
     *
     * @return integer
     */
    public function shielding();

    /**
     * Retrieve the player shielding skill tries.
     *
     * @return integer
     */
    public function shieldingTries();

    /**
     * Retrieve the player fishing skill.
     *
     * @return integer
     */
    public function fishing();

    /**
     * Retrieve the player fishing skill tries.
     *
     * @return integer
     */
    public function fishingTries();

    /**
     * Retrieve the player world.
     *
     * @return \Apolune\Contracts\Server\World
     */
    public function world();

    /**
     * Check if the player has been hidden.
     *
     * @return boolean
     */
    public function isHidden();

    /**
     * Check if the player has been deleted.
     *
     * @return boolean
     */
    public function isDeleted();

    /**
     * Retrieve a URL friendly slug.
     *
     * @return string
     */
    public function slug();
}
