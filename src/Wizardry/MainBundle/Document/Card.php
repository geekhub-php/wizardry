<?php

namespace Wizardry\MainBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document
 */

class Card {

    /**
     * @ODM\Id
     */
    private $id;

    /**
     * @ODM\Field(type="string")
     */
    private $name;

    /**
     * @ODM\Field(type="string")
     */
    private $manacost;

    /**
     * @ODM\Field(type="file")
     */
    private $image;

    /**
     * @ODM\Field(type="string")
     */
    private $type;

    /**
     * @ODM\Field(type="string")
     */
    private $subtype;

    /**
     * @ODM\Field(type="string")
     */
    private $rarity;

    /**
     * @ODM\Field(type="float")
     */
    private $power;

    /**
     * @ODM\Field(type="float")
     */
    private $toughness;

    /**
     * @ODM\Field(type="string")
     */
    private $description;

    /**
     * @ODM\Field(type="string")
     */
    private $artDescription;

    /**
     * @ODM\Field(type="string")
     */
    private $artist;
}
