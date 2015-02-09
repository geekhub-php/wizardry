<?php

namespace Wizardry\MainBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Wizardry\MainBundle\Document\Block;
use Wizardry\MainBundle\Document\Card;

    /**
     * @ODM\Document(collection="Set")
     */

class Set {

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
    private $number;

    /**
     * @ODM\Field(type="string")
     */
    private $shortName;

    /**
     * @ODM\ReferenceMany(targetDocument="Card", mappedBy="set")
     */
    private $cardContain = [];

    /**
     * Set id
     *
     * @param \Wizardry\MainBundle\Document\Block $id
     * @return self
     */
    public function setId(\Wizardry\MainBundle\Document\Block $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get id
     *
     * @return \Wizardry\MainBundle\Document\Block $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set number
     *
     * @param string $number
     * @return self
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Get number
     *
     * @return string $number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set shortName
     *
     * @param string $shortName
     * @return self
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
        return $this;
    }

    /**
     * Get shortName
     *
     * @return string $shortName
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Set cardContain
     *
     * @param string $cardContain
     * @return self
     */
    public function setCardContain($cardContain)
    {
        $this->cardContain = $cardContain;
        return $this;
    }

    /**
     * Get cardContain
     *
     * @return string $cardContain
     */
    public function getCardContain()
    {
        return $this->cardContain;
    }
    public function __construct()
    {
        $this->cardContain = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add cardContain
     *
     * @param Wizardry\MainBundle\Document\Card $cardContain
     */
    public function addCardContain(\Wizardry\MainBundle\Document\Card $cardContain)
    {
        $this->cardContain[] = $cardContain;
    }

    /**
     * Remove cardContain
     *
     * @param Wizardry\MainBundle\Document\Card $cardContain
     */
    public function removeCardContain(\Wizardry\MainBundle\Document\Card $cardContain)
    {
        $this->cardContain->removeElement($cardContain);
    }

    public function __toString()
    {
        return $this->name;
    }
}
