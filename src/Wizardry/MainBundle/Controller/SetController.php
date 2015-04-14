<?php

namespace Wizardry\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SetController extends Controller
{
    public function showAction($id)
    {
        $set = $this->get('doctrine_mongodb')
            ->getRepository('WizardryMainBundle:Set')
            ->find($id);

        if (!$set) {
            throw $this->createNotFoundException();
        }

        return $this->render('WizardryMainBundle:Set:set.html.twig', array(
            'set' => $set,
        ));
    }
}
