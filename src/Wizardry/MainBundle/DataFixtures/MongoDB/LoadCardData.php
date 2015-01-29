<?php

namespace Wizardry\MainBundle\DataFixtures\MongoDB;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Nelmio\Alice\Fixtures;

class LoadCardData extends DataFixtureLoader
{

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
