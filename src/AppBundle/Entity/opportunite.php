<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * opportunite
 *
 * @ORM\Table(name="opportunite")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\opportuniteRepository")
 */
class opportunite
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;
    
    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="description_detaillee", type="string", length=4096)
     */
    private $descriptionDetaillee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="datetime")
     */
    private $dateAjout;
    
    /**
     * @var string
     *
     * @ORM\Column(name="tjm", type="string", length=255, nullable=true)
     */
    private $tjm;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_demarrage_souhaitee", type="datetime")
     */
    private $dateDemarrageSouhaitee;
    
    /**
     * @ORM\ManyToMany(targetEntity="candidat")
     */
    private $listeCandidats;
    
    /**
     * @ORM\ManyToMany(targetEntity="technologie")
     */
    private $listeTechnologies;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="utilisateur")
     */
    private $utilisateur;

    /******Début Constructeur de jointure******/
    
    public function __construct()
    {
        $this->listeCandidats = new ArrayCollection();
        $this->listeTechnologies = new ArrayCollection();
        
    }
    
    /******Fin Constructeur de la jointure******/
    
    /******Début Getter de la jointure + Getter/Setter ManyToOne **********/
    
    public function getListeCandidats()
    {
        return $this->listeCandidats;
    }
    
    public function getListeTechnologies()
    {
        return $this->listeTechnologies;
    }
    
    
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
    /******Fin Getter de la jointure + Getter/Setter ManyToOne **********/
    
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
     * Set titre
     *
     * @param string $titre
     *
     * @return opportunite
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }
    
    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return opportunite
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
        
        return $this;
    }
    
    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set descriptionDetaillee
     *
     * @param string $descriptionDetaillee
     *
     * @return opportunite
     */
    public function setDescriptionDetaillee($descriptionDetaillee)
    {
        $this->descriptionDetaillee = $descriptionDetaillee;

        return $this;
    }

    /**
     * Get descriptionDetaillee
     *
     * @return string
     */
    public function getDescriptionDetaillee()
    {
        return $this->descriptionDetaillee;
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     *
     * @return opportunite
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    /**
     * Get dateAjout
     *
     * @return \DateTime
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * Set dateDemarrageSouhaitee
     *
     * @param \DateTime dateDemarrageSouhaitee
     *
     * @return opportunite
     */
    public function setDateDemarrageSouhaitee($dateDemarrageSouhaitee)
    {
        $this->dateDemarrageSouhaitee = $dateDemarrageSouhaitee;

        return $this;
    }

    /**
     * Get dateDemarrageSouhaitee
     *
     * @return \DateTime
     */
    public function getDateDemarrageSouhaitee()
    {
        return $this->dateDemarrageSouhaitee;
    }
    
    /**
     * Set tjm
     *
     * @param string $tjm
     *
     * @return opportunite
     */
    public function setTjm($tjm)
    {
        $this->tjm = $tjm;
        
        return $this;
    }
    
    /**
     * Get tjm
     *
     * @return string
     */
    public function getTjm()
    {
        return $this->tjm;
    }
    
    /**
     * Add candidat
     *
     * @param candidat $candidat
     *
     * @return opportunite
     */
    public function addCandidat(candidat $candidat)
    {
        $this->listeCandidats[] = $candidat;
        return $this;
    }
    
    /**
     * Remove candidat
     *
     * @param candidat $candidat
     */
    public function removeCandidat(candidat $candidat)
    {
        $this->listeCandidats->removeElement($candidat);
    }
    
    /**
     * Add technologie
     *
     * @param technologie $technologie
     *
     * @return opportunite
     */
    public function addTechnologie(technologie $technologie)
    {
        $this->listeTechnologies[] = $technologie;
        return $this;
    }
    
    /**
     * Remove technologie
     *
     * @param technologie $technologie
     */
    public function removeTechnologie(technologie $technologie)
    {
        $this->listeTechnologies->removeElement($technologie);
    }
}

