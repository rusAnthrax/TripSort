<?php

namespace App;

use App\Transport\TransportFactory;

/**
 * Class FacadeTrip
 *
 * @package app\FacadeTrip
 */
class TripFacade
{
    /**
     * @param  array $cardsArray
     *
     * @return array
     *
     * @throws Exception\TransportTypeInvalid
     */
    public function newRandomJourneys(array $cardsArray): array
    {
        $tripSorter = new TripSort($cardsArray);
        $sortedTrip = $tripSorter->sort();

        $directions = [];

        foreach ($sortedTrip as $index => $card) {
            echo $index + 1 . '. ' . TransportFactory::createTransport($card['transport'])->getMsg($card) . PHP_EOL;
            if ($index == count($sortedTrip) - 1) {
                $directions[] = $index + 2 . '. ' . 'You have arrived at your final destination.' . PHP_EOL;
            }
        }

        return $directions;
    }
}