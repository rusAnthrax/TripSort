<?php

namespace Tests;

use App\TripSort;

class TripSortTest extends \PHPUnit\Framework\TestCase
{
    protected $cardsArray = [
        [
            'origin'          => 'Moscow',
            'destination'     => 'Novosibirsk',
            'transport'       => 'train',
            'transport_route' => 'MosNov',
            'seat'            => '16',
        ],
        [
            'origin'          => 'Lipetsk',
            'destination'     => 'Voronezh',
            'transport'       => 'plane',
            'transport_route' => 'LipVor',
            'seat'            => '6C',
            'gate'            => '1',
        ],
        [
            'origin'          => 'Voronezh',
            'destination'     => 'Moscow',
            'transport'       => 'plane',
            'transport_route' => 'VorMos',
            'seat'            => '7A',
            'gate'            => '1',
        ],
        [
            'origin'      => 'Novosibirsk',
            'destination' => 'AkademGorodok',
            'transport'   => 'bus',
        ],
    ];

    protected $expectedCardsArray = [
        [
            'origin'          => 'Lipetsk',
            'destination'     => 'Voronezh',
            'transport'       => 'plane',
            'transport_route' => 'LipVor',
            'seat'            => '6C',
            'gate'            => '1',
        ],
        [
            'origin'          => 'Voronezh',
            'destination'     => 'Moscow',
            'transport'       => 'plane',
            'transport_route' => 'VorMos',
            'seat'            => '7A',
            'gate'            => '1',
        ],
        [
            'origin'          => 'Moscow',
            'destination'     => 'Novosibirsk',
            'transport'       => 'train',
            'transport_route' => 'MosNov',
            'seat'            => '16',
        ],
        [
            'origin'      => 'Novosibirsk',
            'destination' => 'AkademGorodok',
            'transport'   => 'bus',
        ],
    ];

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $tripSorter = new TripSort($this->cardsArray);
        $sortedTrip = $tripSorter->sort();
        foreach ($sortedTrip as $key => $element) {
            $this->assertEquals($this->expectedCardsArray[$key]['origin'], $element['origin'], 'Origins differ!');
            $this->assertEquals($this->expectedCardsArray[$key]['destination'], $element['destination'], 'Destinations differ!');
            $this->assertEquals($this->expectedCardsArray[$key]['transport'], $element['transport'], 'Transports differ!');
            if (isset($element['transport_route'])) {
                $this->assertEquals($this->expectedCardsArray[$key]['transport_route'], $element['transport_route'], 'Route numbers differ!');
            }
        }
    }
}
