<?php

namespace WorkActivityBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use WorkActivityBundle\Entity\Period;
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
        $periodRepository = $this->getEM()->getRepository('WorkActivityBundle:Period');

        $validPeriod = $periodRepository->getLastPeriods();
        $currentPeriod = $periodRepository->getCurrentPeriod();

        if (!$validPeriod['isValid']) {
            return $this->redirectToRoute('workactivity_period_new');
        }

        $activities = $this->getEM()->getRepository('WorkActivityBundle:Activity')->findBy(['id' => $currentPeriod[0]->getId()]);

        return $this->render('WorkActivityBundle:Period:index.html.haml', [
            'activities' => $activities,
            'currentPeriod' => $currentPeriod[0], //todo, here should be only one array element,  I will have to remove item [0]w
            'periods' => $validPeriod['period']
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
        $period = new Period();
        $form   = $this->createForm(PeriodType::class, $period, ['label' => 'first']);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getEM()->persist($period);
            $this->getEM()->flush();

            $this->addFlash('success', 'new period was created');

            return $this->redirectToRoute('workactivity_period_index');
        }


        return $this->render('WorkActivityBundle:Period:new.html.haml', ['form' => $form->createView()]);
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
        $form   = $this->createForm(PeriodType::class, $period, ['label' => 'first']);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getEM()->persist($period);
            $this->getEM()->flush();

            $this->addFlash('success', 'new period was created');

            return $this->redirectToRoute('workactivity_period_index');
        }


        return $this->render('WorkActivityBundle:Period:new.html.haml', ['form' => $form->createView()]);
    }

    /**
     * @param Period $period
     *
     * @Route("/{period}/remove")
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeAction(Period $period)
    {
        $this->getEM()->remove($period);
        $this->getEM()->flush();

        return $this->redirectToRoute('workactivity_period_index');
    }
}
