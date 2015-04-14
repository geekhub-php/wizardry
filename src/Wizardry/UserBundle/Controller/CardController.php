<?php

namespace Wizardry\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CardController extends Controller
{
    public function showAction($id)
    {
        $card = $this->get('doctrine_mongodb')
            ->getRepository('WizardryMainBundle:Card')
            ->find($id);

        if (!$card) {
            throw $this->createNotFoundException();
        }

        return $this->render('WizardryUserBundle:Card:card.html.twig', array(
            'card' => $card,
        ));
    }
}
