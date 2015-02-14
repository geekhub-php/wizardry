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
    private $shortName;

    /**
     * @ODM\ReferenceMany(targetDocument="Card", mappedBy="set")
     */
    private $cardContain = [];

    /**
     * @ODM\ReferenceOne(targetDocument="Block", mappedBy="setContain")
     */
    private $blockIncluded;

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

    /**
     * Add blockIncluded
     *
     * @param Wizardry\MainBundle\Document\Block $blockIncluded
     */
    public function addBlockIncluded(\Wizardry\MainBundle\Document\Block $blockIncluded)
    {
        $this->blockIncluded[] = $blockIncluded;
    }

    /**
     * Remove blockIncluded
     *
     * @param Wizardry\MainBundle\Document\Block $blockIncluded
     */
    public function removeBlockIncluded(\Wizardry\MainBundle\Document\Block $blockIncluded)
    {
        $this->blockIncluded->removeElement($blockIncluded);
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
