<?php

namespace WorkActivityBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use WorkActivityBundle\Entity\Activity;
use WorkActivityBundle\Entity\Period;
use WorkActivityBundle\Form\Type\ActivityType;

/**
 * Class ActivityController
 *
 * @Route("/activity")
 *
 * @package WorkActivityBundle\Controller
 */
class ActivityController extends BaseController
{
    /**
     * @Route("/")
     *
     * @return mixed
     */
    public function indexAction()
    {
        return $this->render('WorkActivityBundle:Activity:index.html.haml');
    }

    /**
     * @param Period $period
     * @param Request $request
     *
     * @Route("/{period}new")
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Period $period, Request $request)
    {
        $form = $this->createForm(ActivityType::class);
        $form->handleRequest($request);

        if($form->isValid()){
            /** @var Activity $activity */
            $activity = $form->getData();
            $activity->setPeriod($period);
            $this->getEM()->persist($activity);
            $this->getEM()->flush();

            $this->addFlash('success', 'New Activity was registered');

            return $this->redirectToRoute('workactivity_period_index');
        }

        return $this->render('WorkActivityBundle:Activity:new.html.haml', ['form'=>$form->createView()]);
    }

    /**
     * @param Request $request
     *
     * @Route("/new")
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request)
    {
        $form = $this->createForm(ActivityType::class);
        $form->handleRequest($request);

        if($form->isValid()){
            $this->getEM()->persist($form->getData());
            $this->getEM()->flush();

            $this->addFlash('success', 'New Activity was registered');

            return $this->redirectToRoute('workactivity_activity_index');
        }

        return $this->render('WorkActivityBundle:Activity:new.html.haml', ['form'=>$form->createView()]);
    }


}
