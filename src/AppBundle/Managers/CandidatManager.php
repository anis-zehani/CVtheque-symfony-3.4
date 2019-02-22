<?php

namespace AppBundle\Managers;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\candidat;
use AppBundle\Managers\BaseManager;

class CandidatManager extends BaseManager
{
    protected $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function loadCandidat($candidatId) {
        return $this->getDoctrine()
        ->getRepository(candidat::class)
        ->findOneBy(array('id' => $candidatId));
    }
    
    /**
     * Save candidat entity
     *
     * @param candidat $candidat
     */
    public function saveCandidat(candidat $candidat)
    {
        $this->persistAndFlush($candidat);
    }

}
