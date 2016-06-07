<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Purchase;
use AppBundle\Form\Type\PurchaseType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/purchase")
 */
class PurchaseController extends BaseController
{
    /**
     * @Route("/")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $purchase = $this->getDoctrine()->getRepository('AppBundle:Purchase')->findAll();

        return $this->render('AppBundle:Purchase:index.html.haml', ['purchases'=>$purchase]);
    }

    /**
     * @Route("/new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(PurchaseType::class);
        $form->handleRequest($request);

        if($form->isValid()){
            $purchase = $form->getData();
            $this->getEM()->persist($purchase);
            $this->getEM()->flush();

            $this->addFlash('success', 'New purchase was saved');

            return $this->redirectToRoute('app_purchase_index');
        }

        return $this->render('AppBundle:Purchase:edit.html.haml', ['form'=>$form->createView()]);
    }

    /**
     * @Route("/{purchase}/edit")
     * @param Purchase $purchase
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Purchase $purchase, Request $request)
    {
        $form = $this->createForm(PurchaseType::class, $purchase);
        $form->handleRequest($request);

        if($form->isValid()){
            $this->getEM()->persist($purchase);
            $this->getEM()->flush();

            $this->addFlash('success', 'New purchase was saved');

            return $this->redirectToRoute('app_purchase_index');
        }

        return $this->render('AppBundle:Purchase:edit.html.haml', ['form'=>$form->createView()]);
    }

    /**
     * @Route("/{purchase}/remove")
     * @param Purchase $purchase
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function removeAction(Purchase $purchase)
    {
        $this->getEM()->remove($purchase);
        $this->getEM()->flush();

        $this->addFlash('success', 'Purchase record was removed successfully');

        return $this->redirectToRoute('app_purchase_index');
    }
}
