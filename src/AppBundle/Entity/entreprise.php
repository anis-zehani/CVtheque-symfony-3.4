<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\technologie;

/**
 * entreprise
 *
 * @ORM\Table(name="entreprise")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\entrepriseRepository")
 */
class entreprise
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
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;
    
    /**
     * @var string
     *
     * @ORM\Column(name="site_web", type="string", length=255)
     */
    private $siteWeb;
    
    /**
     * @ORM\ManyToMany(targetEntity="technologie")
     */
    private $listeTechnologies;
    
    /******Début Constructeur de le jointure ManyToMany******/
    
    public function __construct()
    {
        $this->listeTechnologies = new ArrayCollection();
    }
    
    /******Fin Constructeur de la jointure******/
    
    /******Début Getter de la jointure ManyToMany**********/
    
    public function getListeTechnologies()
    {
        return $this->listeTechnologies;
    }
    
    /******Fin Getter de la jointure ManyToMany*************/


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
     * Set nom
     *
     * @param string $nom
     *
     * @return entreprise
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return entreprise
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }
    
    /**
     * Set siteWeb
     *
     * @param string $siteWeb
     *
     * @return entreprise
     */
    public function setSiteWeb($siteWeb)
    {
        $this->siteWeb = $siteWeb;
        
        return $this;
    }
    
    /**
     * Get siteWeb
     *
     * @return string
     */
    public function getSiteWeb()
    {
        return $this->siteWeb;
    }
    
    /**
     * Add technologie
     *
     * @param technologie $technologie
     *
     * @return entreprise
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

