<?php

namespace AppBundle\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zend\Diactoros\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/app/example", name="homepage")
     */
    public function indexAction(ServerRequestInterface $psrRequest)
    {
        $queryParams = $psrRequest->getQueryParams();
        $name = isset($queryParams['name']) ? $queryParams['name'] : 'anonymous';

        $psrResponse = new Response();
        $psrResponse->getBody()->write(sprintf('Hello %s!', htmlspecialchars($name)));

        return $psrResponse;
    }
}
