<?php

namespace App\Transport;

/**
 * Class TrainTransport
 *
 * @package app\Transport\TrainTransport
 */
class TrainTransport extends Transport
{
    protected $msg = "Take train %s from %s to %s. Sit in seat %s.";

    /**
     * @param  array $card
     *
     * @return String
     */
    public function getMsg(array $card)
    {
        $msgString = sprintf($this->msg, $card['transport_route'], $card['origin'], $card['destination'], $card['seat']);

        return $msgString;
    }
}
