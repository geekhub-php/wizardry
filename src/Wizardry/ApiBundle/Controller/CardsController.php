<?php

namespace Wizardry\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CardsController extends Controller
{

    /**
     * @return array
     * @View()
     */
    public function getCardsAction()
    {
        $cards = $this->get('doctrine_mongodb')
            ->getRepository('WizardryMainBundle:Card')
            ->findAll();

        return [
            'cards' => $cards
        ];

    }

    /**
     * @View()
     * @param $card
     * @return array
     */
    public function getCardAction($card)
    {
        $singleCard = $this->get('doctrine_mongodb')
            ->getRepository('WizardryMainBundle:Card')
            ->find($card);

        return [
            'card' => $singleCard
        ];
    }
}
