<?php

namespace App\Transport;

/**
 * Class Transport
 *
 * @package app\Transport\Transport
 */
abstract class Transport
{
    protected $msg;

    /**
     * @param  array $card
     */
    abstract public function getMsg(array $card);
}
