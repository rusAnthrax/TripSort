<?php

namespace App;

/**
 * Class TripSort
 *
 * @package app\TripSort
 */
class TripSort
{

    /**
     * Array of cards
     *
     * @var array
     */
    private $cardsArray = [];


    public function __construct(array $cardsArray)
    {
        $this->cardsArray = $cardsArray;
    }

    /**
     * Sort a trip array
     *
     * @return array
     */
    public function sort()
    {
        $this->getFirstAndLastCard();
        $this->sortCards();

        return $this->cardsArray;
    }

    /**
     * Get first and last card
     */
    private function getFirstAndLastCard()
    {
        if (count($this->cardsArray) < 2) {
            // array is empty or has one element
            return $this->cardsArray;
        }

        // Find first and last element
        for ($i = 0, $max = count($this->cardsArray); $i < $max; $i++) {
            $isFirstCards = true;
            $isLastCard = true;

            foreach ($this->cardsArray as $index => $card) {
                if ($this->sameLocations($this->cardsArray[$i]['origin'], $card['destination'])) {
                    // check If this card have a predecessor
                    $isFirstCards = false;
                } elseif ($this->sameLocations($this->cardsArray[$i]['destination'], $card['origin'])) {
                    // check If this card have a successor
                    $isLastCard = false;
                }
            }

            // modify array and put first and last card
            if ($isFirstCards) {
                $first_element = $this->cardsArray[$i];
                unset($this->cardsArray[$i]);
                array_unshift($this->cardsArray, $first_element);
            } elseif ($isLastCard) {
                $last_element = $this->cardsArray[$i];
                unset($this->cardsArray[$i]);
                array_push($this->cardsArray, $last_element);
            }

        }

        // reindex array
        $this->cardsArray = array_values($this->cardsArray);
    }

    /**
     * Sorting legs
     */
    private function sortCards()
    {
        for ($i = 0, $max = count($this->cardsArray) - 1; $i < $max; $i++) {

            foreach ($this->cardsArray as $index => $trip) {
                if ($this->sameLocations($this->cardsArray[$i]['destination'], $trip['origin'])) {
                    //switch between elements in stack
                    $nextIndex = $i + 1;
                    $tempElement = $this->cardsArray[$nextIndex];
                    $this->cardsArray[$nextIndex] = $trip;
                    $this->cardsArray[$index] = $tempElement;
                    break;
                }
            }
        }
    }

    private function sameLocations($location1, $location2)
    {
        return 0 === strcasecmp($location1, $location2);
    }
}