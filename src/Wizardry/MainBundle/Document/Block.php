<?php

namespace Wizardry\MainBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Wizardry\MainBundle\Document\Set;

    /**
     * @ODM\Document(collection="Block")
     */

class Block {
    /**
     * @ODM\Id
     */
    private $id;

    /**
     * @ODM\Field(type="string")
     */
    private $name;

    /**
     * @ODM\ReferenceMany(targetDocument="Set", inversedBy="blockIncluded")
     */
    private $setContain = [];

    /**
     * Get id
     *
     * @return id $id
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
     * Set setContain
     *
     * @param string $setContain
     * @return self
     */
    public function setSetContain($setContain)
    {
        $this->setContain = $setContain;
        return $this;
    }

    /**
     * Get setContain
     *
     * @return string $setContain
     */
    public function getSetContain()
    {
        return $this->setContain;
    }
    public function __construct()
    {
        $this->setContain = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add setContain
     *
     * @param Wizardry\MainBundle\Document\Set $setContain
     */
    public function addSetContain(\Wizardry\MainBundle\Document\Set $setContain)
    {
        $this->setContain[] = $setContain;
    }

    /**
     * Remove setContain
     *
     * @param Wizardry\MainBundle\Document\Set $setContain
     */
    public function removeSetContain(\Wizardry\MainBundle\Document\Set $setContain)
    {
        $this->setContain->removeElement($setContain);
    }

    public function __toString()
    {
        return $this->name;
    }
}
