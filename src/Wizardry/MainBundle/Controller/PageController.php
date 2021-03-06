<?php

namespace Wizardry\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function aboutAction()
    {
        return $this->render('WizardryMainBundle:Page:about.html.twig');
    }

    public function rulesAction()
    {
        return $this->render('WizardryMainBundle:Page:rules.html.twig');
    }

    public function gameplayAction()
    {
        return $this->render('WizardryMainBundle:Page:gameplay.html.twig');
    }
}
