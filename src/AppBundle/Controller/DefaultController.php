<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
    	if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {

	        return $this->render('default/index.html.twig', [
	            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
	        ]);
	    } else {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
	    }
    }
}
