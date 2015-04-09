<?php

namespace Wizardry\UserBundle\Security\Core\User;

use Wizardry\UserBundle\Entity\User;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;

class VkontakteProvider
{
    public function setUserData(User $user, UserResponseInterface $response)
    {
        $responseArray = $response->getResponse();
        $username = $response->getUsername();
        $user->setFirstNameVkontakte($responseArray['response'][0]['first_name']);
        $user->setLastNameVkontakte($responseArray['response'][0]['last_name']);
        $user->setEmail($responseArray['email']);
        $user->setEmailVkontakte($responseArray['email']);
        $user->setUsername($username .'Vkontakte');
        $user->setPassword($username);
        $user->setVkontakteId($response->getUsername());
        $user->setVkontakteAccessToken($response->getAccessToken());
        $user->setEnabled(true);
        return $user;
    }
    public function setAddUserData(User $user, UserResponseInterface $response)
    {
        $responseArray = $response->getResponse();
        $user->setFirstNameVkontakte($responseArray['response'][0]['first_name']);
        $user->setLastNameVkontakte($responseArray['response'][0]['last_name']);
        $user->setVkontakteId($response->getUsername());
        $user->setVkontakteAccessToken($response->getAccessToken());
        $user->setEmailVkontakte($responseArray['email']);
        return $user;
    }
}
