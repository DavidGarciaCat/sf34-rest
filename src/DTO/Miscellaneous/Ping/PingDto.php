<?php

namespace App\DTO\Miscellaneous\Ping;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy("all")
 */
class PingDto
{
    /**
     * @var string
     *
     * @Serializer\Expose()
     * @Serializer\Groups({"ping"})
     */
    public $ping = 'pong';

    /**
     * @var null
     *
     * @Serializer\Expose()
     * @Serializer\Groups({"pong"})
     */
    public $null;
}
