<?php

namespace Wizardry\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CardsController extends Controller
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  description="Returns a collection of Cards",
     *  statusCodes={
     *  200="Returned when all parameters were correct",
     *  404="Returned when documents are not found",
     *  500="Returned when MongoDB not run or another error",
     *  },
     * )
     *
     * @return array
     * @View()
     */
    public function getCardsAction()
    {
        $cards = $this->get('doctrine_mongodb')
            ->getRepository('WizardryMainBundle:Card')
            ->findAll();

        return [
            'cards' => $cards,
        ];
    }

    /**
     * @ApiDoc(
     *  description="Returns a single Card",
     *  statusCodes={
     *  200="Returned when all parameters were correct",
     *  404="Returned when documents are not found",
     *  500="Returned when MongoDB not run or another error",
     *  },
     * )
     *
     * @View()
     *
     * @param string $id Card ID
     *
     * @return array
     */
    public function getCardAction($id)
    {
        $singleCard = $this->get('doctrine_mongodb')
            ->getRepository('WizardryMainBundle:Card')
            ->find($id);

        if (!$singleCard) {
            throw $this->createNotFoundException();
        }

        return [
            'card' => $singleCard,
        ];
    }
}
