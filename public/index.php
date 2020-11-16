<?php

use Trains\Controllers\Index;
use Trains\Controllers\Service;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/railalefan/phpopenldbws/OpenLDBWS.php';

Flight::set('flight.views.path', __DIR__ . '/../src/Views');

Flight::register('openLDBWS', 'OpenLDBWS', [$_SERVER['OPENLDBWS_KEY'], true]);

Flight::route('/(@code:[A-Z]{3})', [Index::class, 'index']);
Flight::route('/@serviceId:[A-Za-z0-9]+', [Service::class, 'index']);

Flight::start();