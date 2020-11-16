<?php

namespace Trains\Controllers;

use Flight;

class Service
{
    public function index($serviceId)
    {
        $serviceId = base64_decode($serviceId);

        $OpenLDBWS = Flight::openLDBWS();

        $response  = json_decode(json_encode($OpenLDBWS->GetServiceDetails($serviceId)), true);

        Flight::render(
            'service.php',
            [
                'response'     => $response,
            ],
            'body'
        );

        Flight::render('layout.php', []);
    }
}