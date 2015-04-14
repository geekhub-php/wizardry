<?php

namespace Wizardry\UserBundle\Document;

use Sonata\UserBundle\Document\BaseGroup as BaseGroup;

class Group extends BaseGroup
{
    /**
     * @var int
     */
    protected $id;

    /**
     * Get id.
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }
}
