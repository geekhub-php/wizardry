<?php

namespace Wizardry\MainBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

    /**
     * @ODM\Document(collection="Set")
     */

class Set
{
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
    private $shortName;

    /**
     * @ODM\ReferenceMany(targetDocument="Card")
     */
    private $cardContain = [];

    /**
     * @ODM\ReferenceOne(targetDocument="Block")
     */
    private $blockIncluded;

    /**
     * Get id
     *
     * @return \Wizardry\MainBundle\Document\Set $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param  string $name
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
     * Set shortName
     *
     * @param  string $shortName
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
     * @param  string $cardContain
     * @return self
     */
    public function setCardContain($cardContain)
    {
        $this->cardContain = $cardContain;

        return $this;
    }

    /**
     * Set blockIncluded
     *
     * @param  string $blockIncluded
     * @return self
     */
    public function setBlockIncluded($blockIncluded)
    {
        $this->blockIncluded = $blockIncluded;

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

    /**
     * Get blockIncluded
     *
     * @return Doctrine\Common\Collections\Collection $blockIncluded
     */
    public function getBlockIncluded()
    {
        return $this->blockIncluded;
    }

    public function __toString()
    {
        return $this->name;
    }
}
