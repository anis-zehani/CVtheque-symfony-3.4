<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\technologie;

/**
 * candidat
 *
 * @ORM\Table(name="candidat")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\candidatRepository")
 */
class candidat
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
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_de_naissance", type="datetime", nullable=true)
     */
    private $dateDeNaissance;
    
    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;
    
    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     */
    private $telephone;
    
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;
    
    /**
     * @var string
     *
     * @ORM\Column(name="specialite", type="string", length=255, nullable=true)
     */
    private $specialite;
    
    /**
     * @var string
     *
     * @ORM\Column(name="annee_graduation", type="string", length=255, nullable=true)
     */
    private $anneeGraduation;
    
    /**
     * @var string
     *
     * @ORM\Column(name="annee_demarrage_carriere", type="string", length=255, nullable=true)
     */
    private $anneeDemarrageCarriere;
    
    /**
     * @var string
     *
     * @ORM\Column(name="situation_familiale", type="string", length=255, nullable=true)
     */
    private $situationFamiliale;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombre_enfants", type="string", length=255, nullable=true)
     */
    private $nombreEnfants;
    
    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="salaire_actuel", type="string", length=255, nullable=true)
     */
    private $salaireActuel;
    
    /**
     * @var string
     *
     * @ORM\Column(name="pretention_salariale", type="string", length=255, nullable=true)
     */
    private $pretentionSalariale;
    
    /**
     * @var string
     *
     * @ORM\Column(name="niveau_en_francais", type="string", length=255, nullable=true)
     */
    private $niveauEnFrancais;
    
    /**
     * @var string
     *
     * @ORM\Column(name="niveau_en_anglais", type="string", length=255, nullable=true)
     */
    private $niveauEnAnglais;
    
    /**
     * @var string
     *
     * @ORM\Column(name="note_globale", type="string", length=255, nullable=true)
     */
    private $noteGlobale;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description_detaillee", type="string", length=4096, nullable=true)
     */
    private $descriptionDetaillee;
    
    /**
     * @var string
     *
     * @ORM\Column(name="preavis", type="string", length=255, nullable=true)
     */
    private $preavis;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_de_disponibilite", type="datetime", nullable=true)
     */
    private $dateDeDisponibilite;
    
    /**
     * @var string
     *
     * @ORM\Column(name="visa", type="string", length=255, nullable=true)
     */
    private $visa;
    
    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="entreprise")
     */
    private $entreprise;
    
    /**
     * @ORM\ManyToMany(targetEntity="cv", cascade="remove")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $listeCvs;
    
    /**
     * @ORM\ManyToMany(targetEntity="technologie")
     */
    private $listeTechnologies;
    
    /**
     * @ORM\ManyToMany(targetEntity="certification")
     */
    private $listeCertifications;
    
    /**
     * @ORM\ManyToMany(targetEntity="diplome")
     */
    private $listeDiplomes;
    
    /**
     * @ORM\ManyToMany(targetEntity="ecole")
     */
    private $listeEcoles;
    
    
    /******Début Constructeurs des jointures ManyToMany******/
    
    public function __construct()
    {
        $this->listeCvs = new ArrayCollection();
        $this->listeTechnologies = new ArrayCollection();
        $this->listeCertifications = new ArrayCollection();
        $this->listeDiplomes = new ArrayCollection();
        $this->listeEcoles = new ArrayCollection();
    }
    
    /******Fin Constructeurs des jointures ManyToMany******/
    
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
    
    
    /******Début Getters des jointures ManyToMany**********/
    public function getListeCvs()
    {
        return $this->listeCvs;
    }
    
    public function getListeTechnologies()
    {
        return $this->listeTechnologies;
    }
    
    public function getListeCertifications()
    {
        return $this->listeCertifications;
    }
    
    public function getListeDiplomes()
    {
        return $this->listeDiplomes;
    }
    
    public function getListeEcoles()
    {
        return $this->listeEcoles;
    }
    /******Fin Getters des jointures ManyToMany*************/
    
    
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
     * @return candidat
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
     * @return candidat
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
     * Set dateDeNaissance
     *
     * @param \DateTime $dateDeNaissance
     *
     * @return candidat
     */
    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->dateDeNaissance = $dateDeNaissance;
        
        return $this;
    }
    
    /**
     * Get dateDeNaissance
     *
     * @return \DateTime
     */
    public function getDateDeNaissance()
    {
        return $this->dateDeNaissance;
    }
    
    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return candidat
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
     * Set telephone
     *
     * @param string $telephone
     *
     * @return candidat
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
     * @return candidat
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
     * Set specialite
     *
     * @param string $specialite
     *
     * @return candidat
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;
        
        return $this;
    }
    
    /**
     * Get specialite
     *
     * @return string
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }
    
    /**
     * Set anneeGraduation
     *
     * @param string $anneeGraduation
     *
     * @return candidat
     */
    public function setAnneeGraduation($anneeGraduation)
    {
        $this->anneeGraduation = $anneeGraduation;
        
        return $this;
    }
    
    /**
     * Get anneeGraduation
     *
     * @return string
     */
    public function getAnneeGraduation()
    {
        return $this->anneeGraduation;
    }
    
    /**
     * Set anneeDemarrageCarriere
     *
     * @param string $anneeDemarrageCarriere
     *
     * @return candidat
     */
    public function setAnneeDemarrageCarriere($anneeDemarrageCarriere)
    {
        $this->anneeDemarrageCarriere = $anneeDemarrageCarriere;
        
        return $this;
    }
    
    /**
     * Get anneeDemarrageCarriere
     *
     * @return string
     */
    public function getAnneeDemarrageCarriere()
    {
        return $this->anneeDemarrageCarriere;
    }
    
    /**
     * Set situationFamiliale
     *
     * @param string $situationFamiliale
     *
     * @return candidat
     */
    public function setSituationFamiliale($situationFamiliale)
    {
        $this->situationFamiliale = $situationFamiliale;
        
        return $this;
    }
    
    /**
     * Get situationFamiliale
     *
     * @return string
     */
    public function getSituationFamiliale()
    {
        return $this->situationFamiliale;
    }
    
    /**
     * Set nombreEnfants
     *
     * @param string $nombreEnfants
     *
     * @return candidat
     */
    public function setNombreEnfants($nombreEnfants)
    {
        $this->nombreEnfants = $nombreEnfants;
        
        return $this;
    }
    
    /**
     * Get nombreEnfants
     *
     * @return string
     */
    public function getNombreEnfants()
    {
        return $this->nombreEnfants;
    }
    
    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return candidat
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
     * Set salaireActuel
     *
     * @param string $salaireActuel
     *
     * @return candidat
     */
    public function setSalaireActuel($salaireActuel)
    {
        $this->salaireActuel = $salaireActuel;
        
        return $this;
    }
    
    /**
     * Get salaireActuel
     *
     * @return string
     */
    public function getSalaireActuel()
    {
        return $this->salaireActuel;
    }
    
    /**
     * Set pretentionSalariale
     *
     * @param string $pretentionSalariale
     *
     * @return candidat
     */
    public function setPretentionSalariale($pretentionSalariale)
    {
        $this->pretentionSalariale = $pretentionSalariale;
        
        return $this;
    }
    
    /**
     * Get pretentionSalariale
     *
     * @return string
     */
    public function getPretentionSalariale()
    {
        return $this->pretentionSalariale;
    }
    
    /**
     * Set niveauEnFrancais
     *
     * @param string $niveauEnFrancais
     *
     * @return candidat
     */
    public function setNiveauEnFrancais($niveauEnFrancais)
    {
        $this->niveauEnFrancais = $niveauEnFrancais;
        
        return $this;
    }
    
    /**
     * Get niveauEnFrancais
     *
     * @return string
     */
    public function getNiveauEnFrancais()
    {
        return $this->niveauEnFrancais;
    }
    
    /**
     * Set niveauEnAnglais
     *
     * @param string $niveauEnAnglais
     *
     * @return candidat
     */
    public function setNiveauEnAnglais($niveauEnAnglais)
    {
        $this->niveauEnAnglais = $niveauEnAnglais;
        
        return $this;
    }
    
    /**
     * Get niveauEnAnglais
     *
     * @return string
     */
    public function getNiveauEnAnglais()
    {
        return $this->niveauEnAnglais;
    }
    
    /**
     * Set noteGlobale
     *
     * @param string $noteGlobale
     *
     * @return candidat
     */
    public function setNoteGlobale($noteGlobale)
    {
        $this->noteGlobale = $noteGlobale;
        
        return $this;
    }
    
    /**
     * Get noteGlobale
     *
     * @return string
     */
    public function getNoteGlobale()
    {
        return $this->noteGlobale;
    }
    
    /**
     * Set descriptionDetaillee
     *
     * @param string $descriptionDetaillee
     *
     * @return candidat
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
     * Set preavis
     *
     * @param string $preavis
     *
     * @return candidat
     */
    public function setPreavis($preavis)
    {
        $this->preavis = $preavis;
        
        return $this;
    }
    
    /**
     * Get preavis
     *
     * @return string
     */
    public function getPreavis()
    {
        return $this->preavis;
    }
    
    /**
     * Set dateDeDisponibilite
     *
     * @param \DateTime $dateDeDisponibilite
     *
     * @return candidat
     */
    public function setDateDeDisponibilite($dateDeDisponibilite)
    {
        $this->dateDeDisponibilite = $dateDeDisponibilite;
        
        return $this;
    }
    
    /**
     * Get dateDeDisponibilite
     *
     * @return \DateTime
     */
    public function getDateDeDisponibilite()
    {
        return $this->dateDeDisponibilite;
    }
    
    /**
     * Set visa
     *
     * @param string $visa
     *
     * @return candidat
     */
    public function setVisa($visa)
    {
        $this->visa = $visa;
        
        return $this;
    }
    
    /**
     * Get visa
     *
     * @return string
     */
    public function getVisa()
    {
        return $this->visa;
    }
    
    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return candidat
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
     * Add cv
     *
     * @param cv $cv
     *
     * @return candidat
     */
    public function addCv(cv $cv)
    {
        $this->listeCvs[] = $cv;
        return $this;
    }
    
    /**
     * Remove cv
     *
     * @param cv $cv
     */
    public function removeCv(cv $cv)
    {
        $this->listeCvs->removeElement($cv);
    }
    
    /**
     * Add technologie
     *
     * @param technologie $technologie
     *
     * @return candidat
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
    
    
    /**
     * Add certification
     *
     * @param certification $certification
     *
     * @return candidat
     */
    public function addCertification(certification $certification)
    {
        $this->listeCertifications[] = $certification;
        return $this;
    }
    
    /**
     * Remove certification
     *
     * @param certification $certification
     */
    public function removeCertification(certification $certification)
    {
        $this->listeCertifications->removeElement($certification);
    }
    
    /**
     * Add diplome
     *
     * @param diplome $diplome
     *
     * @return candidat
     */
    public function addDiplome(diplome $diplome)
    {
        $this->listeDiplomes[] = $diplome;
        return $this;
    }
    
    /**
     * Remove diplome
     *
     * @param diplome $diplome
     */
    public function removeDiplome(diplome $diplome)
    {
        $this->listeDiplomes->removeElement($diplome);
    }
    
    /**
     * Add ecole
     *
     * @param ecole $ecole
     *
     * @return candidat
     */
    public function addEcole(ecole $ecole)
    {
        $this->listeEcoles[] = $ecole;
        return $this;
    }
    
    /**
     * Remove ecole
     *
     * @param ecole $ecole
     */
    public function removeEcole(ecole $ecole)
    {
        $this->listeEcoles->removeElement($ecole);
    }
    
}

