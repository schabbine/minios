<?php

function Autoload($namespace)
{
    $tab = explode('\\', $namespace);

    if ($tab[0] == 'AppBundle') {
        $src = __DIR__ . '/../src/' . str_replace('\\', '/', $namespace) . '.php';
    } else {
        $src = __DIR__ . '/' . str_replace('\\', '/', $namespace) . '.php';
    }

    include $src;
}

//-----------------------------------------------
spl_autoload_register('Autoload');
//-----------------------------------------------
