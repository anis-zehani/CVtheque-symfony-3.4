<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * recherche_sauvegarde
 *
 * @ORM\Table(name="recherche_sauvegarde")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\recherche_sauvegardeRepository")
 */
class recherche_sauvegarde
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
     * @var string
     *
     * @ORM\Column(name="requete", type="string", length=1024)
     */
    private $requete;
    
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
     * Set requete
     *
     * @param string $requete
     *
     * @return recherche_sauvegarde
     */
    public function setRequete($requete)
    {
        $this->requete = $requete;

        return $this;
    }

    /**
     * Get requete
     *
     * @return string
     */
    public function getRequete()
    {
        return $this->requete;
    }
}

