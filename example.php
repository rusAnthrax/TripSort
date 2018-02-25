<?php

use App\Exception\TransportTypeInvalid;
use App\TripFacade;

require_once __DIR__ . '/vendor/autoload.php';

define('JSON_FILE_PATH', __DIR__ . '/data/');

$jsonFile = JSON_FILE_PATH . 'cards.json';
$json = file_get_contents($jsonFile);
$json_data = json_decode($json, true);

$facadeTrip = new TripFacade();
try {
    $completeJourney = $facadeTrip->BuildTrip($json_data);
} catch (TransportTypeInvalid $exception) {
    echo $exception->getMessage();
    die();
}

echo implode(PHP_EOL, $completeJourney) . PHP_EOL;
