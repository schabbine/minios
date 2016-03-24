<?php

include __DIR__ . '/../vendor/autoload.php';

use Framework\Kernel;

$kernel = new Kernel();
$kernel->handle();

if ($kernel->isValid()) {
    $kernel->send();
} else {
    echo $kernel->getError();
}

