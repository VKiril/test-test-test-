<?php
/**
 * Created by PhpStorm.
 * User: Acer i7 NITRO
 * Date: 5/25/2016
 * Time: 10:21 PM
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    public function addFlash($type, $message)
    {
        parent::addFlash($type, $message); // TODO: Change the autogenerated stub
    }

    public function getEM()
    {
        return $this->getDoctrine()->getManager();
    }
}
