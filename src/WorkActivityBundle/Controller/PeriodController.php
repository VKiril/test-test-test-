<?php

namespace WorkActivityBundle\Controller;



use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use WorkActivityBundle\Entity\Period;

/**
 * Class PeriodController
 * @package WorkActivityBundle\Controller
 *
 * @Route("/period")
 */
class PeriodController extends BaseController
{
    /**
     * @Route("/")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $period = $this->getEM()->getRepository('WorkActivityBundle:Period')
            ->findAll();

        return $this->render('WorkActivityBundle:Period:index.html.haml', ['period' => $period]);
    }

    /**
     * @param Request $request
     *
     * @Route("/new")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        return $this->render('WorkActivityBundle:Period:new.html.haml', []);
    }

    /**
     * @param Period $period
     * @param Request $request
     *
     * @Route("/{period}/edit")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Period $period, Request $request)
    {
        return $this->render('WorkActivityBundle:Period:new.html.haml', []);
    }
}
