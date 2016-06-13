<?php

namespace WorkActivityBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use WorkActivityBundle\Entity\Period;
use WorkActivityBundle\Form\Type\ActivityType;
use WorkActivityBundle\Form\Type\PeriodType;

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
        $period      = $this->getEM()->getRepository('WorkActivityBundle:Period')->findBy(['closed' => false]);

        $periodForm  = $this->createForm(PeriodType::class, null, ['empty_data' => 'first']);
        $holidayForm = $this->createForm(PeriodType::class, null, ['empty_data' => 'second']);

        return $this->render('WorkActivityBundle:Period:index.html.haml', [
            'period'       => $period,
            'periodForm'   => $periodForm->createView(),
            'holidayForm'  => $holidayForm->createView(),
        ]);
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
