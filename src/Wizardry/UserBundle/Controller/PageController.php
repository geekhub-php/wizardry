<?php

namespace Wizardry\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Doctrine\ODM\MongoDB\DocumentRepository;

class PageController extends Controller
{
    public function aboutAction()
    {

        return $this->render('WizardryUserBundle:Page:about.html.twig');
    }

    public function rulesAction()
    {

        return $this->render('WizardryUserBundle:Page:rules.html.twig');
    }

    public function gameplayAction()
    {

        return $this->render('WizardryUserBundle:Page:gameplay.html.twig');
    }
}
