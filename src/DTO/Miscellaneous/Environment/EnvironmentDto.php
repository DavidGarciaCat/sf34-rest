<?php

namespace App\DTO\Miscellaneous\Environment;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy("all")
 */
class EnvironmentDto
{
    /**
     * @var string
     *
     * @Serializer\Expose()
     * @Serializer\Groups({"environment"})
     */
    public $webServerVersion;

    /**
     * @var string
     *
     * @Serializer\Expose()
     * @Serializer\Groups({"environment"})
     */
    public $phpVersion;

    /**
     * EnvironmentDto constructor.
     *
     * @param string $webServerVersion
     * @param string $phpVersion
     */
    public function __construct(string $webServerVersion, string $phpVersion)
    {
        $this->webServerVersion = $webServerVersion;
        $this->phpVersion = $phpVersion;
    }
}