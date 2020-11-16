<?php

namespace Trains\Controllers;

use Flight;

class Index
{
    public function index($code)
    {
        $openLDBWS = Flight::openLDBWS();

        if (! $code) {
            $code = $_SERVER['DEFAULT_CRS'];
        }

        $response = json_decode(json_encode($openLDBWS->GetDepartureBoard(25, $code)), true);

        Flight::render(
            'index.php',
            [
                'locationName' => $response['GetStationBoardResult']['locationName'],
                'crs'          => $response['GetStationBoardResult']['crs'],
                'messages'     => isset($response['GetStationBoardResult']['nrccMessages']) ? $response['GetStationBoardResult']['nrccMessages'] : '',
                'response'     => $response,
            ],
            'body'
        );

        Flight::render('layout.php', []);
    }
}