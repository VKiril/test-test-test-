<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $tes =  1;
        return $this->render('AppBundle:Default:homepage.html.haml', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
}
