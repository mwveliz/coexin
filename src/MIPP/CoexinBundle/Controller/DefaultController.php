<?php

namespace MIPP\CoexinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CoexinBundle:Default:index.html.twig');
    }
}
