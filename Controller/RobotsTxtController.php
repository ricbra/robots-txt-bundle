<?php

namespace Ricbra\Bundle\RobotsTxtBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\EngineInterface;

class RobotsTxtController
{
    private $templating;
    private $allowRobots;

    public function __construct(EngineInterface $templating, $allowRobots)
    {
        $this->templating = $templating;
        $this->allowRobots = $allowRobots;
    }

    public function robotsTxtAction()
    {
        $content = $this->templating->renderView('RicbraRobotsTxtBundle:RobotsTxt:robots.txt.twig', array(
            'allow_robots' => $this->allowRobots
        ));

        return new Response($content, 200, array(
            'Content-Type' => 'text/plain'
        ));
    }
}
