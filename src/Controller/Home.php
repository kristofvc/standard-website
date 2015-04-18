<?php

namespace Kristofvc\Web\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\EngineInterface;

class Home
{
    /**
     * @var EngineInterface
     */
    private $templating;

    /**
     * @param EngineInterface $templating
     */
    public function __construct(EngineInterface $templating)
    {

        $this->templating = $templating;
    }

    public function __invoke()
    {
        return new Response($this->templating->render('::base.html.twig'));
    }
}