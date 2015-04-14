<?php

namespace Wizardry\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SetsController extends Controller
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  description="Returns a collection of Sets",
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
    public function getSetsAction()
    {
        $sets = $this->get('doctrine_mongodb')
            ->getRepository('WizardryMainBundle:Set')
            ->findAll();

        return [
            'sets' => $sets,
        ];
    }

    /**
     * @ApiDoc(
     *  description="Returns a single Set",
     *  statusCodes={
     *  200="Returned when all parameters were correct",
     *  404="Returned when documents are not found",
     *  500="Returned when MongoDB not run or another error",
     *  },
     * )
     *
     * @param string $id Set ID
     *
     * @return array
     * @View()
     */
    public function getSetAction($id)
    {
        $set = $this->get('doctrine_mongodb')
            ->getRepository('WizardryMainBundle:Set')
            ->find($id);

        if (!$set) {
            throw $this->createNotFoundException();
        }

        return [
            'set' => $set,
        ];
    }
}
