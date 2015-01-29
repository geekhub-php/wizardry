<?php

namespace Wizardry\MainBundle\DataFixtures\MongoDB;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Wizardry\MainBundle\Document\Card;

class LoadCardData extends DataFixtureLoader
{
    public function load(ObjectManager $manager)
    {

    }

    /**
     * {@inheritDoc}
     */
    protected function getFixtures()
    {
        return  array(
            __DIR__.'/fixtures.yml',
        );
    }
}
