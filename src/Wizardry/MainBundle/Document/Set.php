<?php

namespace Wizardry\MainBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Wizardry\MainBundle\Document\Block;
use Wizardry\MainBundle\Document\Card;

class Set {

    /**
     * @ODM\Id
     * @ODM\ReferenceOne(targetDocument="Block", inversedBy="setContain")
     */
    private $id;

    /**
     * @ODM\Field(type="string")
     */
    private $name;

    /**
     * @ODM\Field(type="string")
     */
    private $number;

    /**
     * @ODM\Field(type="string")
     */
    private $shortName;

    /**
     * @ODM\Field(type="string")
     */
    private $cardContain;
}
