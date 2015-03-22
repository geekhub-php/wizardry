<?php

namespace Wizardry\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class WizardryUserBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'SonataUserBundle';
    }
}
