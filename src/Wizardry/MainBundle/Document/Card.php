<?php

namespace Wizardry\MainBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document(collection="Card")
 */
class Card
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
    private $manaCost;

    /**
     * @ODM\Field(type="int")
     */
    private $convertedManaCost;

    /**
     * @ODM\Field(type="string")
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
     * @ODM\Field(type="int")
     */
    private $power;

    /**
     * @ODM\Field(type="int")
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
     *@ODM\ReferenceOne(targetDocument="Set")
     */
    private $set;

    /**
     * Get id.
     *
     * @return \Wizardry\MainBundle\Document\Card $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set manaCost.
     *
     * @param string $manaCost
     *
     * @return self
     */
    public function setManaCost($manaCost)
    {
        $this->manaCost = $manaCost;

        return $this;
    }

    /**
     * Get manaCost.
     *
     * @return string $manaCost
     */
    public function getManaCost()
    {
        return $this->manaCost;
    }

    /**
     * Set convertedManaCost.
     *
     * @param int $convertedManaCost
     *
     * @return self
     */
    public function setConvertedManaCost($convertedManaCost)
    {
        $this->convertedManaCost = $convertedManaCost;

        return $this;
    }

    /**
     * Get convertedManaCost.
     *
     * @return int $convertedManaCost
     */
    public function getConvertedManaCost()
    {
        return $this->convertedManaCost;
    }

    /**
     * Set image.
     *
     * @param file $image
     *
     * @return self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return file $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set type.
     *
     * @param string $type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set subType.
     *
     * @param string $subType
     *
     * @return self
     */
    public function setSubType($subType)
    {
        $this->subType = $subType;

        return $this;
    }

    /**
     * Get subType.
     *
     * @return string $subType
     */
    public function getSubType()
    {
        return $this->subType;
    }

    /**
     * Set rarity.
     *
     * @param string $rarity
     *
     * @return self
     */
    public function setRarity($rarity)
    {
        $this->rarity = $rarity;

        return $this;
    }

    /**
     * Get rarity.
     *
     * @return string $rarity
     */
    public function getRarity()
    {
        return $this->rarity;
    }

    /**
     * Set power.
     *
     * @param float $power
     *
     * @return self
     */
    public function setPower($power)
    {
        $this->power = $power;

        return $this;
    }

    /**
     * Get power.
     *
     * @return float $power
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * Set toughness.
     *
     * @param float $toughness
     *
     * @return self
     */
    public function setToughness($toughness)
    {
        $this->toughness = $toughness;

        return $this;
    }

    /**
     * Get toughness.
     *
     * @return float $toughness
     */
    public function getToughness()
    {
        return $this->toughness;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set artDescription.
     *
     * @param string $artDescription
     *
     * @return self
     */
    public function setArtDescription($artDescription)
    {
        $this->artDescription = $artDescription;

        return $this;
    }

    /**
     * Get artDescription.
     *
     * @return string $artDescription
     */
    public function getArtDescription()
    {
        return $this->artDescription;
    }

    /**
     * Set artist.
     *
     * @param string $artist
     *
     * @return self
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist.
     *
     * @return string $artist
     */
    public function getArtist()
    {
        return $this->artist;
    }

    public function __toString()
    {
        return $this->name;
    }

    protected $file;

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    public function getAbsolutePath()
    {
        return null === $this->image ? null : $this->getUploadRootDir().'/'.$this->image;
    }

    public function getWebPath()
    {
        return null === $this->image ? null : $this->getUploadDir().'/'.$this->image;
    }

    protected function getUploadRootDir($basepath)
    {
        // the absolute directory path where uploaded documents should be saved
        return $basepath.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/images/cards';
    }

    public function upload($basepath)
    {
        // the file property can be empty if the field is not required
        if (null === $this->file) {
            return;
        }

        if (null === $basepath) {
            return;
        }

        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the target filename to move to
        $this->file->move($this->getUploadRootDir($basepath), $this->file->getClientOriginalName());

        // set the path property to the filename where you'ved saved the file
        $this->setImage($this->file->getClientOriginalName());

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }

    /**
     * Set set.
     *
     * @param Wizardry\MainBundle\Document\Set $set
     *
     * @return self
     */
    public function setSet(\Wizardry\MainBundle\Document\Set $set)
    {
        $this->set = $set;

        return $this;
    }

    /**
     * Get set.
     *
     * @return Wizardry\MainBundle\Document\Set $set
     */
    public function getSet()
    {
        return $this->set;
    }
}
