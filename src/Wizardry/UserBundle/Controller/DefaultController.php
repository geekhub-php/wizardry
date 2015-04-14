<?php

namespace Wizardry\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $blocks = $this->get('doctrine_mongodb')
            ->getRepository('WizardryMainBundle:Block')
            ->findAll();

        return $this->render('WizardryUserBundle:Block:index.html.twig', array(
            'blocks' => $blocks,
        ));
    }
}
