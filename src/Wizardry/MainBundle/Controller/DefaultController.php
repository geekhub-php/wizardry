<?php

namespace Wizardry\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Doctrine\ODM\MongoDB\DocumentRepository;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $sets = $this->get('doctrine_mongodb')
            ->getRepository('WizardryMainBundle:Set')
            ->findAll();

        return $this->render('WizardryMainBundle:Set:index.html.twig', array(
            'sets' => $sets,
        ));
    }
}
