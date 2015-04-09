<?php

namespace Wizardry\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(name="facebook_id", type="string", length=255, nullable=true) */
    protected $facebookId;

    /** @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true) */
    protected $facebookAccessToken;

    /** @ORM\Column(name="vkontakte_id", type="string", length=255, nullable=true) */
    protected $vkontakteId;

    /** @ORM\Column(name="vkontakte_access_token", type="string", length=255, nullable=true) */
    protected $vkontakteAccessToken;

    /** @ORM\Column(name="first_name_vkontakte", type="string", length=255, nullable=true) */
    protected $firstNameVkontakte;

    /** @ORM\Column(name="last_name_vkontakte", type="string", length=255, nullable=true) */
    protected $lastNameVkontakte;

    /** @ORM\Column(name="first_name_facebook", type="string", length=255, nullable=true) */
    protected $firstNameFacebook;
    /** @ORM\Column(name="last_name_facebook", type="string", length=255, nullable=true) */
    protected $lastNameFacebook;

    /** @ORM\Column(name="email_facebook", type="string", length=255, nullable=true) */
    protected $emailFacebook;

    /** @ORM\Column(name="email_vkontakte", type="string", length=255, nullable=true) */
    protected $emailVkontakte;

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @return mixed
     */
    public function getVkontakteAccessToken()
    {
        return $this->vkontakteAccessToken;
    }
    /**
     * @return mixed
     */
    public function getVkontakteId()
    {
        return $this->vkontakteId;
    }
    /**
     * @return mixed
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }
    /**
     * @return mixed
     */
    public function getFacebookAccessToken()
    {
        return $this->facebookAccessToken;
    }
    /**
     * @param mixed $facebook_access_token
     */
    public function setFacebookAccessToken($facebookAccessToken)
    {
        $this->facebookAccessToken = $facebookAccessToken;
    }
    /**
     * @param mixed $facebook_id
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;
    }
    /**
     * @param mixed $vkontakte_access_token
     */
    public function setVkontakteAccessToken($vkontakteAccessToken)
    {
        $this->vkontakteAccessToken = $vkontakteAccessToken;
    }
    /**
     * @param mixed $vkontakte_id
     */
    public function setVkontakteId($vkontakteId)
    {
        $this->vkontakteId = $vkontakteId;
    }
    /**
     * @return mixed
     */
    public function getLastNameFacebook()
    {
        return $this->lastNameFacebook;
    }
    /**
     * @return mixed
     */
    public function getLastNameVkontakte()
    {
        return $this->lastNameVkontakte;
    }
    /**
     * @return mixed
     */
    public function getFirstNameVkontakte()
    {
        return $this->firstNameVkontakte;
    }
    /**
     * @return mixed
     */
    public function getFirstNameFacebook()
    {
        return $this->firstNameFacebook;
    }
    /**
     * @param mixed $firstNameFacebook
     */
    public function setFirstNameFacebook($firstNameFacebook)
    {
        $this->firstNameFacebook = $firstNameFacebook;
    }
    /**
     * @param mixed $firstNameVkontakte
     */
    public function setFirstNameVkontakte($firstNameVkontakte)
    {
        $this->firstNameVkontakte = $firstNameVkontakte;
    }
    /**
     * @param mixed $lastNameFacebook
     */
    public function setLastNameFacebook($lastNameFacebook)
    {
        $this->lastNameFacebook = $lastNameFacebook;
    }
    /**
     * @param mixed $lastNameVkontakte
     */
    public function setLastNameVkontakte($lastNameVkontakte)
    {
        $this->lastNameVkontakte = $lastNameVkontakte;
    }
    /**
     * @param mixed $emailFacebook
     */
    public function setEmailFacebook($emailFacebook)
    {
        $this->emailFacebook = $emailFacebook;
    }
    /**
     * @return mixed
     */
    public function getEmailFacebook()
    {
        return $this->emailFacebook;
    }

    /**
     * @return mixed
     */
    public function getEmailVkontakte()
    {
        return $this->emailVkontakte;
    }

    /**
     * @param mixed $emailVkontakte
     */
    public function setEmailVkontakte($emailVkontakte)
    {
        $this->emailVkontakte = $emailVkontakte;
    }


}
