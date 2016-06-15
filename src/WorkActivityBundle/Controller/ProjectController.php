<?php

namespace WorkActivityBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use WorkActivityBundle\Entity\Project;
use WorkActivityBundle\Form\Type\ProjectType;

/**
 * Class ProjectController
 *
 * @Route("/project")
 *
 * @package WorkActivityBundle\Controller
 */
class ProjectController extends BaseController
{
    /**
     * @Route("/")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $projects = $this->getEM()->getRepository('WorkActivityBundle:Project')->findAll();

        return $this->render('WorkActivityBundle:Project:index.html.haml', ['projects' => $projects]);
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
        $form = $this->createForm(ProjectType::class);
        $form->handleRequest($request);

        if($form->isValid()) {
            $this->getEM()->persist($form->getData());
            $this->getEM()->flush();

            $this->addFlash('success', 'added new project');

            return $this->redirectToRoute('workactivity_project_index');
        }

        return $this->render('WorkActivityBundle:Project:new.html.haml', ['form' => $form->createView()]);
    }

    /**
     * @param Project $project
     * @param Request $request
     *
     * @Route("/{project}/edit")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Project $project, Request $request)
    {
        return $this->render('');
    }

    /**
     * @param Project $project
     *
     * @Route("/{project}")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function removeAction(Project $project)
    {
        return $this->render('');
    }
}
