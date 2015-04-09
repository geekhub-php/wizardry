<?php

namespace Wizardry\UserBundle\Security\Core\User;

use Wizardry\UserBundle\Entity\User;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;

class FacebookProvider
{
    public function setUserData(User $user, UserResponseInterface $response)
    {
        $responseArray = $response->getResponse();
        $username = $response->getUsername();
        $user->setFirstNameFacebook($responseArray['first_name']);
        $user->setLastNameFacebook($responseArray['last_name']);
        $user->setEmail($responseArray['email']);
        $user->setEmailFacebook($responseArray['email']);
        $user->setUsername($username .'Facebook');
        $user->setPassword($username);
        $user->setFacebookId($response->getUsername());
        $user->setFacebookAccessToken($response->getAccessToken());
        $user->setEnabled(true);
        return $user;
    }
    public function setAddUserData(User $user, UserResponseInterface $response)
    {
        $responseArray = $response->getResponse();
        $user->setFirstNameFacebook($responseArray['first_name']);
        $user->setLastNameFacebook($responseArray['last_name']);
        $user->setEmailFacebook($responseArray['email']);
        $user->setFacebookId($response->getUsername());
        $user->setFacebookAccessToken($response->getAccessToken());
        return $user;
    }
}
