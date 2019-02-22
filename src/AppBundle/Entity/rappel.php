<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * rappel
 *
 * @ORM\Table(name="rappel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\rappelRepository")
 */
class rappel
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
     * @ORM\Column(name="description", type="string", length=1024, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime", nullable=true)
     */
    private $datetime;
    
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
     * Set description
     *
     * @param string $description
     *
     * @return rappel
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return rappel
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }
}

