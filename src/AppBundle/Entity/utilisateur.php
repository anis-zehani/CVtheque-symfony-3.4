<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\technologie;

/**
 * utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\utilisateurRepository")
 */
class utilisateur
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
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255, nullable=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=255, nullable=true)
     */
    private $poste;
    
    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description_detaillee", type="string", length=4096, nullable=true)
     */
    private $descriptionDetaillee;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="entreprise")
     */
    private $entreprise;
    
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
    
    /******Début Getter/Setter ManyToOne **********/
    
    /**
     * @return entreprise
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }
    
    /**
     * @param entreprise $entreprise
     */
    public function setEntreprise(entreprise $entreprise)
    {
        $this->entreprise = $entreprise;
        
    }
    /******Fin Getter/Setter ManyToOne **********/
    
    
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return utilisateur
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
     * Set login
     *
     * @param string $login
     *
     * @return utilisateur
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return utilisateur
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return utilisateur
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return utilisateur
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return utilisateur
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set poste
     *
     * @param string $poste
     *
     * @return utilisateur
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get poste
     *
     * @return string
     */
    public function getPoste()
    {
        return $this->poste;
    }
    
    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return utilisateur
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        
        return $this;
    }
    
    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }
    
    /**
     * Set descriptionDetaillee
     *
     * @param string $descriptionDetaillee
     *
     * @return utilisateur
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
     * Add technologie
     *
     * @param technologie $technologie
     *
     * @return utilisateur
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

