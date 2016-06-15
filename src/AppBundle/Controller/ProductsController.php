<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Product;
use AppBundle\Entity\Purchase;
use AppBundle\Form\Type\ProductType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/product")
 */
class ProductsController extends BaseController
{
    /**
     * @Route("/{purchase}")
     *
     * @param Purchase $purchase
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Purchase $purchase)
    {
        $products = $this->getEM()->getRepository('AppBundle:Product')->findBy(['purchase' => $purchase]);

        return $this->render('AppBundle:Product:index.html.haml', ['products' => $products, 'purchase' => $purchase]);
    }

    /**
     * @Route("/{purchase}/new")
     *
     * @param Purchase $purchase
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Purchase $purchase, Request $request)
    {
        $form = $this->createForm(ProductType::class);
        $form->handleRequest($request);

        if($form->isValid()){
            /** @var Product $product */
            $product = $form->getData();
            $product->setPurchase($purchase);

            $this->getEM()->persist($product);
            $this->getEM()->flush();

            $this->addFlash('success', 'New product was added');

            return $this->redirectToRoute('app_products_index', ['purchase' => $purchase->getId()]);
        }

        return $this->render('AppBundle:Product:edit.html.haml', ['form' => $form->createView()]);
    }

    /**
     * @Route("/{product}/edit")
     *
     * @param Product $product
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Product $product, Request $request)
    {
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if($form->isValid()){
            /** @var Product $product */
            $product = $form->getData();

            $this->getEM()->persist($product);
            $this->getEM()->flush();

            $this->addFlash('success', 'Product was modified');

            return $this->redirectToRoute('app_products_index', ['purchase' => $product->getPurchase()->getId()]);
        }

        return $this->render('AppBundle:Product:edit.html.haml', ['form' => $form->createView()]);
    }

    /**
     * @Route("/{product}/remove")
     *
     * @param Product $product
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function removeAction(Product $product)
    {
        $this->getEM()->remove($product);
        $this->getEM()->flush();

        $this->addFlash('success', 'Product was removed');
        return $this->redirectToRoute('app_products_index',['purchase' => $product->getPurchase()->getId()]);
    }
}
