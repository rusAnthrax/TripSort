<?php

namespace App\Transport;

/**
 * Class BusTransport
 *
 * @package app\Transport\BusTransport
 */
class BusTransport extends Transport
{
    protected $msg = "Take the airport bus from %s to %s. No seat assignment";

    /**
     * @param  array $card
     *
     * @return String
     */
    public function getMsg(array $card)
    {
        $msgString = sprintf($this->msg, $card['origin'], $card['destination']);

        return $msgString;
    }
}
