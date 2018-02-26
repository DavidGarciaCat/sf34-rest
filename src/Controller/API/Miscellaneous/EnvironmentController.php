<?php

namespace App\Controller\API\Miscellaneous;

use App\DTO\Miscellaneous\Environment\EnvironmentDto;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Kernel;

class EnvironmentController
{
    /**
     * @Rest\Get(path="/api/environment", name="environment")
     * @Rest\View(serializerGroups={"environment"})
     *
     * @param Request $request
     *
     * @return EnvironmentDto
     */
    public function getEnvironmentAction(Request $request): EnvironmentDto
    {
        return new EnvironmentDto(
            $request->server->get('SERVER_SOFTWARE'),
            phpversion(),
            Kernel::VERSION
        );
    }
}
