<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * cv_sauvegarde
 *
 * @ORM\Table(name="cv_sauvegarde")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\cv_sauvegardeRepository")
 */
class cv_sauvegarde
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id_candidat", type="integer", nullable=false)
     */
    private $idCandidat;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="utilisateur")
     */
    private $utilisateur;
    
    /******Début Getter/Setter ManyToOne **********/
    
    /**
     * @return utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
    
    /**
     * @param utilisateur $utilisateur
     */
    public function setUtilisateur(utilisateur $utilisateur)
    {
        $this->utilisateur = $utilisateur;
        
    }
    /******Fin Getter/Setter ManyToOne **********/


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Get idCandidat
     *
     * @return int
     */
    public function getIdCandidat()
    {
        return $this->idCandidat;
    }
    
    /**
     * Set idCandidat
     *
     * @param int $idCandidat
     *
     * @return cv_sauvegarde
     */
    public function setIdCandidat($idCandidat)
    {
        $this->idCandidat = $idCandidat;
        
        return $this;
    }
    
}

