<?php

namespace Wizardry\MainBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Wizardry\MainBundle\Document\Set;

    /**
     * @ODM\Document(collection="Card")
     */

class Card {

    /**
     * @ODM\Id
     * @ODM\ReferenceOne(targetDocument="Set", inversedBy="cardContain")
     */
    private $id;

    /**
     * @ODM\Field(type="string")
     */
    private $name;

    /**
     * @ODM\Field(type="string")
     */
    private $manaCost;

    /**
     * @ODM\Field(type="int")
     */
    private $convertedManaCost;

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
    private $subType;

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

    /**
     * Set id
     *
     * @param Wizardry\MainBundle\Document\Set $id
     * @return self
     */
    public function setId(\Wizardry\MainBundle\Document\Set $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get id
     *
     * @return Wizardry\MainBundle\Document\Set $id
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
     * Set manaCost
     *
     * @param string $manaCost
     * @return self
     */
    public function setManaCost($manaCost)
    {
        $this->manaCost = $manaCost;
        return $this;
    }

    /**
     * Get manaCost
     *
     * @return string $manaCost
     */
    public function getManaCost()
    {
        return $this->manaCost;
    }

    /**
     * Set convertedManaCost
     *
     * @param int $convertedManaCost
     * @return self
     */
    public function setConvertedManaCost($convertedManaCost)
    {
        $this->convertedManaCost = $convertedManaCost;
        return $this;
    }

    /**
     * Get convertedManaCost
     *
     * @return int $convertedManaCost
     */
    public function getConvertedManaCost()
    {
        return $this->convertedManaCost;
    }

    /**
     * Set image
     *
     * @param file $image
     * @return self
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Get image
     *
     * @return file $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set subType
     *
     * @param string $subType
     * @return self
     */
    public function setSubType($subType)
    {
        $this->subType = $subType;
        return $this;
    }

    /**
     * Get subType
     *
     * @return string $subType
     */
    public function getSubType()
    {
        return $this->subType;
    }

    /**
     * Set rarity
     *
     * @param string $rarity
     * @return self
     */
    public function setRarity($rarity)
    {
        $this->rarity = $rarity;
        return $this;
    }

    /**
     * Get rarity
     *
     * @return string $rarity
     */
    public function getRarity()
    {
        return $this->rarity;
    }

    /**
     * Set power
     *
     * @param float $power
     * @return self
     */
    public function setPower($power)
    {
        $this->power = $power;
        return $this;
    }

    /**
     * Get power
     *
     * @return float $power
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * Set toughness
     *
     * @param float $toughness
     * @return self
     */
    public function setToughness($toughness)
    {
        $this->toughness = $toughness;
        return $this;
    }

    /**
     * Get toughness
     *
     * @return float $toughness
     */
    public function getToughness()
    {
        return $this->toughness;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set artDescription
     *
     * @param string $artDescription
     * @return self
     */
    public function setArtDescription($artDescription)
    {
        $this->artDescription = $artDescription;
        return $this;
    }

    /**
     * Get artDescription
     *
     * @return string $artDescription
     */
    public function getArtDescription()
    {
        return $this->artDescription;
    }

    /**
     * Set artist
     *
     * @param string $artist
     * @return self
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;
        return $this;
    }

    /**
     * Get artist
     *
     * @return string $artist
     */
    public function getArtist()
    {
        return $this->artist;
    }
}
