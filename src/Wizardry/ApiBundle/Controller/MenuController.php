<?php
namespace Wizardry\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class MenuController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  description="Returns a collection of Cards"
     * )
     *
     */
    public function showUserMenuAction(Request $request)
    {
        if($this->getUser()){
            $this->get('session')->set('user_menu', 'true');
        }
        return $this->redirect($this->generateUrl('get_cards'));
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  description="Returns a collection of Cards"
     * )
     *
     */
    public function hideUserMenuAction(Request $request)
    {
        if($this->getUser()){
            $this->get('session')->remove('user_menu');
        }
        return $this->redirect($this->generateUrl('get_cards'));
    }
}