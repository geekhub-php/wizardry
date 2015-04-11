<?php

namespace Wizardry\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Doctrine\ODM\MongoDB\DocumentRepository;

class BlockController extends Controller
{
    public function showAction($id)
    {

        $block = $this->get('doctrine_mongodb')
            ->getRepository('WizardryMainBundle:Block')
            ->find($id);

        if (!$block) {
            throw $this->createNotFoundException();
        }

        return $this->render('WizardryUserBundle:Block:block.html.twig', array(
            'block' => $block,
        ));
    }
}
