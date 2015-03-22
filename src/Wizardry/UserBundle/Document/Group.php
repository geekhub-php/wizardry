<?php

namespace Wizardry\UserBundle\Document;

use Sonata\UserBundle\Document\BaseGroup as BaseGroup;

class Group extends BaseGroup
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * Get id.
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
}
