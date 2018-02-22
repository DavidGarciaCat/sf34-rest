<?php

namespace App\Controller\API\Miscellaneous;

use App\DTO\Miscellaneous\Ping\PingDto;
use FOS\RestBundle\Controller\Annotations as Rest;

class PingController
{
    /**
     * @Rest\Get(path="/api/ping", name="ping")
     * @Rest\View()
     */
    public function getPingAction(): PingDto
    {
        return new PingDto();
    }
}
