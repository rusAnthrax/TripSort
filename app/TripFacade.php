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
     * Builds a trip from an array of unsorted boarding cards
     *
     * @param  array $cardsArray unsorted array of boarding cards
     *
     * @return array
     *
     * @throws Exception\TransportTypeInvalid
     */
    public function BuildTrip(array $cardsArray): array
    {
        $tripSorter = new TripSort($cardsArray);
        $sortedTrip = $tripSorter->sort();

        $directions = [];

        foreach ($sortedTrip as $index => $card) {
            $directions[] = $index + 1 . '. ' . TransportFactory::createTransport($card['transport'])->getMsg($card);
        }
        $directions[] = (count($sortedTrip) + 1) . '. ' . 'You have arrived at your final destination.';

        return $directions;
    }
}