<?php

namespace Wizardry\ParseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WizardryParseBundle:Default:index.html.twig', array('name' => $name));
    }
}
