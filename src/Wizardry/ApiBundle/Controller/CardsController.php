<?php

namespace Wizardry\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;

class CardsController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  description="Returns a collection of Cards"
     * )
     *
     * @Annotations\View(
     *  templateVar="getCards"
     * )
     *
     * @return array
     */
    public function getCardsAction()
    {
        if($this->getUser() and $this->get('session')->get('user_menu') == true){
            $cards = $this->getUser()->getCard();
        }
        else {
            $cards = $this->get('doctrine_mongodb')
                ->getRepository('WizardryMainBundle:Card')
                ->findAll();
        }
        return [
            'cards' => $cards,
        ];
    }

    /**
     * @ApiDoc(
     *  description="Returns a single Card"
     * )
     *
     * @Annotations\View()
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

    /**
     * @ApiDoc(
     *  resource=true,
     *  description="Returns a collection of Cards"
     * )
     *
     */
    public function copyCardToUserAction($user_id, $card_id)
    {

        $user = $this->getUser();

        $card = $this->get('doctrine_mongodb.odm.document_manager')
            ->getRepository('WizardryMainBundle:Card')
            ->find($card_id);

        $user->addCard($card);

        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $dm->persist($user);
        $dm->flush();

        return $this->redirect($this->generateUrl('get_cards'));
    }
}
