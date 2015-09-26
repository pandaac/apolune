<?php

if (worlds()->count() > 1) {
    return require_once __DIR__.'/multiworld.php';
}

return require_once __DIR__.'/singleworld.php';
