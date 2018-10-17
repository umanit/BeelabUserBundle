<?php

namespace Beelab\UserBundle\User;

/**
 * Interface used by UserManager and User entity.
 */
interface UserInterface extends \Symfony\Component\Security\Core\User\UserInterface
{
    /**
     * @return string
     */
    public function getPlainPassword();

    /**
     * @return string
     */
    public function getSalt();

    /**
     * @param  string
     *
     * @return bool
     */
    public function hasRole($role);

    /**
     * @param \DateTime $date
     */
    public function setLastLogin(\DateTime $date);

    /**
     * @param string
     */
    public function setPassword($password);
}
