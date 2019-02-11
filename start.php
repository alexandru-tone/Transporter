<?php

// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

$app = new Atone\Transporter\Transporter('./transports.json');
$app->dispatch();