<?php

namespace Wizardry\UserBundle\Document;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document()
 */
class User extends BaseUser
{
    /**
     * @ODM\Id(strategy="auto")
     */
    protected $id;

    /**
     * @ODM\Field(type="string")
     */
    protected $firstName;

    /**
     * @ODM\Field(type="string")
     */
    protected $lastName;

    /**
     * @ODM\ReferenceMany(targetDocument="Wizardry\MainBundle\Document\Card")
     */
    protected $card;

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
     * Set firstName
     *
     * @param  string $firstName
     * @return self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param  string $lastName
     * @return self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    public function __construct()
    {
        $this->card = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add card
     *
     * @param \Wizardry\MainBundle\Document\Card $card
     */
    public function addCard(\Wizardry\MainBundle\Document\Card $card)
    {
        $this->card[] = $card;
    }

    /**
     * Remove card
     *
     * @param \Wizardry\MainBundle\Document\Card $card
     */
    public function removeCard(\Wizardry\MainBundle\Document\Card $card)
    {
        $this->card->removeElement($card);
    }

    /**
     * Get card
     *
     * @return \Doctrine\Common\Collections\Collection $card
     */
    public function getCard()
    {
        return $this->card;
    }
}
