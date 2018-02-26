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
     * @var string
     *
     * @Serializer\Expose()
     * @Serializer\Groups({"environment"})
     */
    public $symfonyVersion;

    /**
     * EnvironmentDto constructor.
     *
     * @param string $webServerVersion
     * @param string $phpVersion
     * @param string $sfVersion
     */
    public function __construct(string $webServerVersion, string $phpVersion, string $sfVersion)
    {
        $this->webServerVersion = $webServerVersion;
        $this->phpVersion = $phpVersion;
        $this->symfonyVersion = $sfVersion;
    }
}