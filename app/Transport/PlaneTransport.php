<?php

namespace App\Transport;

/**
 * Class PlaneTransport
 *
 * @package app\Transport\PlaneTransport
 */
class PlaneTransport extends Transport
{
    protected $msg = "From %s take flight %s to %s. Gate %s, seat %s. ";
    protected $msgBaggage = 'Baggage drop at ticket counter %s. ';
    protected $msgNoBaggage = 'Baggage will we automatically transferred from your last leg.';

    /**
     * @param  array $card
     *
     * @return String
     */
    public function getMsg(array $card)
    {
        $msgString = sprintf($this->msg, $card['origin'], $card['transport_route'], $card['destination'], $card['gate'], $card['seat']);

        if (!empty($card['baggage'])) {
            $msgString .= sprintf($this->msgBaggage, $card['baggage']);
        } else {
            $msgString .= $this->msgNoBaggage;
        }

        return $msgString;
    }
}
