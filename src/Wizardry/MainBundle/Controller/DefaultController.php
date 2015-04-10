<?php

namespace Wizardry\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Doctrine\ODM\MongoDB\DocumentRepository;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $blocks = $this->get('doctrine_mongodb')
            ->getRepository('WizardryMainBundle:Block')
            ->findAll();

        return $this->render('WizardryMainBundle:Block:index.html.twig', array(
            'blocks' => $blocks,
        ));
    }
}
