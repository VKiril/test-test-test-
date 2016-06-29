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
     * @param Period $period
     *
     * @Route("/{period}")
     *
     * @return mixed
     */
    public function indexAction(Period $period)
    {
        $activities = $this->getEM()->getRepository('WorkActivityBundle:Activity')->findByPeriod($period);

        return $this->render('WorkActivityBundle:Activity:index.html.haml', [
            'activities' => $activities,
            'period' => $period
        ]);
    }

    /**
     * @param Period $period
     * @param Request $request
     *
     * @Route("/{period}/new")
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Period $period, Request $request)
    {

        $projects = $this->getEM()->getRepository('WorkActivityBundle:Project')->findAll();

        $buff = [];
        $temp = [];
        foreach($projects as $item) {
            $buff[$item->getName(). ', ' . $item->getOwner()] = $item->getId();
            $temp[$item->getId()] = $item;
        }

        $form = $this->createForm(ActivityType::class, null, ['label' => $buff]);
        $form->handleRequest($request);

        if($form->isValid()){

            /** @var Activity $activity */
            $activity = $form->getData();
            $activity->setPeriod($period);
            $activity->setProject($temp[$request->request->all()['activity']['project']]);
            $activity->setDate(new \DateTime($form->getData()->getDate()));

            $this->getEM()->persist($activity);
            $this->getEM()->flush($activity);

            $this->addFlash('success', 'New Activity was registered');

            return $this->redirectToRoute('workactivity_period_index');
        }

        return $this->render('WorkActivityBundle:Activity:new.html.haml', ['form'=>$form->createView()]);
    }

    /**
     * @param Activity $activity
     * @param Request $request
     *
     * @Route("/{activity}/edit")
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Activity $activity, Request $request)
    {
        $form = $this->createForm(ActivityType::class, $activity);
        $form->handleRequest($request);

        if($form->isValid()){
            $this->getEM()->persist($activity);
            $this->getEM()->flush();

            $this->addFlash('success', 'New Activity was registered');

            return $this->redirectToRoute('workactivity_period_index');
        }

        return $this->render('WorkActivityBundle:Activity:new.html.haml', ['form'=>$form->createView()]);
    }

    /**
     * @param Activity $activity
     *
     * @Route("/{activity}/remove")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeAction(Activity $activity)
    {
        $this->getEM()->remove($activity);
        $this->getEM()->flush();

        return $this->redirectToRoute('workactivity_period_index');
    }
}
