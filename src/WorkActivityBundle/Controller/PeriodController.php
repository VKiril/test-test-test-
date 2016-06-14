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
     * @param Request $request
     *
     * @Route("/")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $activities      = $this->getEM()->getRepository('WorkActivityBundle:Activity')->findAll();
        $period = new Period();
        $periodForm  = $this->createForm(PeriodType::class, $period, ['label' => 'first']);
//        $holidayForm = $this->createForm(PeriodType::class, null, ['empty_data' => 'second']);

        $periodForm->handleRequest($request);

        if($periodForm->isValid()){
            $this->getEM()->persist($period);
            $this->getEM()->flush();

            $this->addFlash('success', 'new period was created');

            return $this->redirectToRoute('workactivity_activity_new', ['period' => $period->getId()]);
        }

        return $this->render('WorkActivityBundle:Period:index.html.haml', [
            'activities'       => $activities,
            'periodForm'   => $periodForm->createView(),
//            'holidayForm'  => $holidayForm->createView(),
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
