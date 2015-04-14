<?php

namespace Wizardry\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlocksController extends Controller
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  description="Returns a collection of Blocks",
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
    public function getBlocksAction()
    {
        $blocks = $this->get('doctrine_mongodb')
            ->getRepository('WizardryMainBundle:Block')
            ->findAll();

        return [
            'blocks' => $blocks,
        ];
    }

    /**
     * @ApiDoc(
     *  description="Returns a single Block",
     *  statusCodes={
     *  200="Returned when all parameters were correct",
     *  404="Returned when documents are not found",
     *  500="Returned when MongoDB not run or another error",
     *  },
     * )
     *
     * @param string $id Block ID
     *
     * @return array
     * @View()
     */
    public function getBlockAction($id)
    {
        $block = $this->get('doctrine_mongodb')
            ->getRepository('WizardryMainBundle:Block')
            ->find($id);

        if (!$block) {
            throw $this->createNotFoundException();
        }

        return [
            'block' => $block,
        ];
    }
}