<?php

namespace App\Transport;

use App\Exception\TransportTypeInvalid;

/**
 * Class TransportFactory
 *
 * @package app\Transport\TransportFactory
 */
class TransportFactory
{
    protected static $transport = [
        'train' => 'App\Transport\TrainTransport',
        'plane' => 'App\Transport\PlaneTransport',
        'bus'   => 'App\Transport\BusTransport',
    ];

    /**
     * @param string $type Transport type
     *
     * @return Transport
     * @throws TransportTypeInvalid
     */
    public static function createTransport($type): Transport
    {
        $targetClass = static::$transport[strtolower($type)];

        if (!class_exists($targetClass)) {
            throw new TransportTypeInvalid("The Transport type '$type' is not recognized.");
        }

        return new $targetClass;
    }
}
