<?php

if (worlds()->count() > 1) {
    return require_once __DIR__.'/Routes/MultiWorld.php';
}

return require_once __DIR__.'/Routes/SingleWorld.php';
