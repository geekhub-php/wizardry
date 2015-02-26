<?php

namespace Wizardry\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class WizardryUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }

}
