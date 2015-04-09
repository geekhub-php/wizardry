<?php

namespace Wizardry\MainBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * SetRepository
 *
 */
class SetRepository extends DocumentRepository
{
    public function getWithSets()
    {
        return $this->getDocumentManager()->getDocumentCollection('Set');

    }
}