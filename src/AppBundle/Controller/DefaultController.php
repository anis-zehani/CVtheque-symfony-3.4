<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\candidat;
use AppBundle\Entity\technologie;
use AppBundle\Entity\certification;
use AppBundle\Entity\diplome;
use AppBundle\Entity\ecole;
use AppBundle\Entity\utilisateur;
use AppBundle\Entity\entreprise;
use AppBundle\Entity\opportunite;
use AppBundle\Entity\rappel;


class DefaultController extends Controller
{
    //protected $utilisateur;
    
    public function __construct()
    {
        //$utilisateur = new utilisateur();
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        //Afficher l'écran de Login
        return $this->render('default/index.html.twig');
    }
    
    /**
     * @Route("/login/", name="login")
     */
    public function loginAction(Request $request)
    {
        //Vérification des paramètres d'accés + renvoi vers le bon écran
        $utilisateur = $this->getDoctrine()->getRepository(utilisateur::class)->loginUtilisateur($request);
        
        //Utilisateur existe
        if (!empty($utilisateur))
        {
            return $this->redirectToRoute('accueil');
        }
        return $this->redirectToRoute('homepage');
        
    }

    
    /**
     * @Route("/accueil/", name="accueil")
     */
    public function accueilAction(Request $request)
    {
        //Renvoi direct vers la HomePage : utilisateur dèja authentifié
        
        $allRappels = $this->getDoctrine()->getRepository(rappel::class)->showAllRappels();
        $allOpportunites = $this->getDoctrine()->getRepository(opportunite::class)->showAllOpportunites();
        
        return $this->render('default/mainAll.html.twig', array('allRappels' => $allRappels, 'allOpportunites' => $allOpportunites, 'EtatOpportunites'=> 'Actives'));
        
    }
    
    /**
     * @Route("/showAllCandidats/", name="showAllCandidats")
     */
    public function showAllCandidatsAction(Request $request)
    {
        $allCandidats = $this->getDoctrine()->getRepository(candidat::class)->showAllCandidats();
        return $this->render('default/mescandidats.html.twig', array('allCandidats' => $allCandidats, 'EtatCandidats'=> 'Actifs'));
    }
    
    /**
     * @Route("/showAllArchivedCandidats/", name="showAllArchivedCandidats")
     */
    public function showAllArchivedCandidatsAction(Request $request)
    {
        $allCandidats = $this->getDoctrine()->getRepository(candidat::class)->showArchivedCandidats();
        return $this->render('default/mescandidats.html.twig', array('allCandidats' => $allCandidats, 'EtatCandidats'=> 'Archivés'));
    }
    
    /**
     * @Route("/archiveOneCandidat/{id}/", name="archiveOneCandidat", requirements={"id" = "\d+"})
     */
    public function archiveOneCandidatAction($id)
    {
        $OneCandidat = $this->getDoctrine()->getRepository(candidat::class)->archiveCandidat($id);
        return $this->render('default/affichagecandidat.html.twig', array('OneCandidat' => $OneCandidat));
        
    }
    
    /**
     * @Route("/activeOneCandidat/{id}/", name="activeOneCandidat", requirements={"id" = "\d+"})
     */
    public function activeOneCandidatAction($id)
    {
        $OneCandidat = $this->getDoctrine()->getRepository(candidat::class)->activeCandidat($id);
        return $this->render('default/affichagecandidat.html.twig', array('OneCandidat' => $OneCandidat));
        
    }
    
    /**
     * @Route("/showOneCandidat/{id}/", name="showOneCandidat", requirements={"id" = "\d+"})
     */
    public function showOneCandidatAction($id)
    {
        $oneCandidat = $this->getDoctrine()->getRepository(candidat::class)->showOneCandidat($id);
        return $this->render('default/affichagecandidat.html.twig', array('detailsCandidat' => $oneCandidat));
    }
    
    /**
     * @Route("/formAddCandidat/", name="formAddCandidat")
     */
    public function formAddCandidatAction(Request $request)
    {
        $allTechnologies = $this->getDoctrine()->getRepository(technologie::class)->showAllTechnologies();
        $allCertifications = $this->getDoctrine()->getRepository(certification::class)->showAllCertifications();
        $allDiplomes = $this->getDoctrine()->getRepository(diplome::class)->showAllDiplomes();
        $allEcoles = $this->getDoctrine()->getRepository(ecole::class)->showAllEcoles();
        $allEntreprises = $this->getDoctrine()->getRepository(entreprise::class)->showAllEntreprises();
        return $this->render('default/ajoutcandidat.html.twig', array('allEntreprises' => $allEntreprises,'allTechnologies' => $allTechnologies, 'allCertifications' => $allCertifications, 'allDiplomes' => $allDiplomes, 'allEcoles' => $allEcoles));
    }
    
    /**
     * @Route("/addCandidat/", name="addCandidat")
     */
    public function addCandidatAction(Request $request)
    {
        $this->getDoctrine()->getRepository(candidat::class)->addCandidat($request);
        return $this->redirectToRoute('showAllCandidats');  
    }
    
    /**
     * @Route("/formUpdateCandidat/{id}/", name="formUpdateCandidat", requirements={"id" = "\d+"})
     */
    public function formUpdateCandidatAction($id)
    {
        $allTechnologies = $this->getDoctrine()->getRepository(technologie::class)->showAllTechnologies();
        $allCertifications = $this->getDoctrine()->getRepository(certification::class)->showAllCertifications();
        $allDiplomes = $this->getDoctrine()->getRepository(diplome::class)->showAllDiplomes();
        $allEcoles = $this->getDoctrine()->getRepository(ecole::class)->showAllEcoles();
        $allEntreprises = $this->getDoctrine()->getRepository(entreprise::class)->showAllEntreprises();
        $oneCandidat = $this->getDoctrine()->getRepository(candidat::class)->showOneCandidat($id);
        
        return $this->render('default/modificationcandidat.html.twig', array('allEntreprises' => $allEntreprises,'allTechnologies' => $allTechnologies, 'allCertifications' => $allCertifications, 'allDiplomes' => $allDiplomes, 'allEcoles' => $allEcoles, 'detailsCandidat' => $oneCandidat));
    }
    
    /**
     * @Route("/updateCandidat/", name="updateCandidat")
     */
    public function updateCandidatAction(Request $request)
    {
        $this->getDoctrine()->getRepository(candidat::class)->updateCandidat($request);
        return $this->redirectToRoute('showOneCandidat', array('id' => $request->get('id')));
        
    }
    
    /**
     * @Route("/deleteCandidat/{id}/", name="deleteCandidat", requirements={"id" = "\d+"})
     */
    public function deleteCandidatAction($id)
    {
        $this->getDoctrine()->getRepository(candidat::class)->deleteCandidat($id);
        return $this->redirectToRoute('showAllCandidats');
    }
    
    /**
     * @Route("/removeTechnologieForCandidat/{idCandidat}/{idTechnologie}/", name="removeTechnologieForCandidat", requirements={"idCandidat" = "\d+" , "idTechnologie" = "\d+"})
     */
    public function removeTechnologieForCandidatAction($idCandidat,$idTechnologie)
    {
        $this->getDoctrine()->getRepository(candidat::class)->removeTechnologieForCandidat($idCandidat,$idTechnologie);
        $oneCandidat = $this->getDoctrine()->getRepository(candidat::class)->showOneCandidat($idCandidat);
        return new JsonResponse(array('detailsCandidat' => $oneCandidat));
    }
    
    /**
     * @Route("/removeCertificationForCandidat/{idCandidat}/{idCertification}/", name="removeCertificationForCandidat", requirements={"idCandidat" = "\d+" , "idCertification" = "\d+"})
     */
    public function removeCertificationForCandidatAction($idCandidat,$idCertification)
    {
        $this->getDoctrine()->getRepository(candidat::class)->removeCertificationForCandidat($idCandidat,$idCertification);
        $oneCandidat = $this->getDoctrine()->getRepository(candidat::class)->showOneCandidat($idCandidat);
        return new JsonResponse(array('detailsCandidat' => $oneCandidat));
    }
    
    /**
     * @Route("/showAllPartenaires/", name="showAllPartenaires")
     */
    public function showAllPartenairesAction(Request $request)
    {
        $allPartenaires = $this->getDoctrine()->getRepository(utilisateur::class)->showAllPartenaires();
        return $this->render('default/mespartenaires.html.twig', array('allPartenaires' => $allPartenaires));
    }
    
    /**
     * @Route("/showOnePartenaire/{id}/", name="showOnePartenaire", requirements={"id" = "\d+"})
     */
    public function showOnePartenaireAction($id)
    {
        $onePartenaire = $this->getDoctrine()->getRepository(utilisateur::class)->showOnePartenaire($id);
        return $this->render('default/affichagepartenaire.html.twig', array('onePartenaire' => $onePartenaire));
        
    }
    
    /**
     * @Route("/deletePartenaire/{id}/", name="deletePartenaire", requirements={"id" = "\d+"})
     */
    public function deletePartenaireAction($id)
    {
        $this->getDoctrine()->getRepository(utilisateur::class)->deletePartenaire($id);
        return $this->redirectToRoute('showAllPartenaires');
    }
    
    /**
     * @Route("/formAddPartenaire/", name="formAddPartenaire")
     */
    public function formAddPartenaireAction(Request $request)
    {
        $allTechnologies = $this->getDoctrine()->getRepository(technologie::class)->showAllTechnologies();
        $allEntreprises = $this->getDoctrine()->getRepository(entreprise::class)->showAllEntreprises();

        return $this->render('default/ajoutpartenaire.html.twig', array('allTechnologies' => $allTechnologies, 'allEntreprises' => $allEntreprises));
    }
    
    /**
     * @Route("/addPartenaire/", name="addPartenaire")
     */
    public function addPartenaireAction(Request $request)
    {
        $this->getDoctrine()->getRepository(utilisateur::class)->addPartenaire($request);
        return $this->redirectToRoute('showAllPartenaires');
    }
    
    /**
     * @Route("/formUpdatePartenaire/{id}/", name="formUpdatePartenaire", requirements={"id" = "\d+"})
     */
    public function formUpdatePartenaire($id)
    {
        $allTechnologies = $this->getDoctrine()->getRepository(technologie::class)->showAllTechnologies();
        $allEntreprises = $this->getDoctrine()->getRepository(entreprise::class)->showAllEntreprises();
        $onePartenaire = $this->getDoctrine()->getRepository(utilisateur::class)->showOnePartenaire($id);
        
        return $this->render('default/modificationpartenaire.html.twig', array('allTechnologies' => $allTechnologies, 'allEntreprises' => $allEntreprises, 'onePartenaire' => $onePartenaire));
    }
    
    /**
     * @Route("/updatePartenaire/", name="updatePartenaire")
     */
    public function updatePartenaireAction(Request $request)
    {
        $this->getDoctrine()->getRepository(utilisateur::class)->updatePartenaire($request);
        return $this->redirectToRoute('showOnePartenaire', array('id' => $request->get('id')));
        
    }
    
    /**
     * @Route("/removeTechnologieForPartenaire/{idPartenaire}/{idTechnologie}/", name="removeTechnologieForPartenaire", requirements={"idPartenaire" = "\d+" , "idTechnologie" = "\d+"})
     */
    public function removeTechnologieForPartenaireAction($idPartenaire,$idTechnologie)
    {
        $this->getDoctrine()->getRepository(utilisateur::class)->removeTechnologieForPartenaire($idPartenaire,$idTechnologie);
        $onePartenaire = $this->getDoctrine()->getRepository(utilisateur::class)->showOnePartenaire($idPartenaire);
        
        return new JsonResponse(array('onePartenaire' => $onePartenaire));
    }
    
    /**
     * @Route("/showAllContacts/", name="showAllContacts")
     */
    public function showAllContactsAction(Request $request)
    {
        $allPartenaires = $this->getDoctrine()->getRepository(utilisateur::class)->showAllContacts();
        return $this->render('default/mescontacts.html.twig', array('allPartenaires' => $allPartenaires));
    }
    
    /**
     * @Route("/formAddContact/", name="formAddContact")
     */
    public function formAddContactAction(Request $request)
    {
        
        $allEntreprises = $this->getDoctrine()->getRepository(entreprise::class)->showAllEntreprises();
        return $this->render('default/ajoutcontact.html.twig', array('allEntreprises' => $allEntreprises));
    }
    
    /**
     * @Route("/addContact/", name="addContact")
     */
    public function addContactAction(Request $request)
    {
        $this->getDoctrine()->getRepository(utilisateur::class)->addContact($request);
        return $this->redirectToRoute('showAllContacts');
    }
    
    /**
     * @Route("/showOneContact/{id}/", name="showOneContact", requirements={"id" = "\d+"})
     */
    public function showOneContactAction($id)
    {
        $oneContact = $this->getDoctrine()->getRepository(utilisateur::class)->showOneContact($id);
        return $this->render('default/affichagecontact.html.twig', array('oneContact' => $oneContact));

    }
    
    /**
     * @Route("/deleteContact/{id}/", name="deleteContact", requirements={"id" = "\d+"})
     */
    public function deleteContactAction($id)
    {
        $this->getDoctrine()->getRepository(utilisateur::class)->deleteContact($id);
        return $this->redirectToRoute('showAllContacts');
    }
    
    /**
     * @Route("/formUpdateContact/{id}/", name="formUpdateContact", requirements={"id" = "\d+"})
     */
    public function formUpdateContact($id)
    {
        $allEntreprises = $this->getDoctrine()->getRepository(entreprise::class)->showAllEntreprises();
        $oneContact = $this->getDoctrine()->getRepository(utilisateur::class)->showOneContact($id);
        
        return $this->render('default/modificationcontact.html.twig', array('allEntreprises' => $allEntreprises, 'oneContact' => $oneContact));
    }
    
    /**
     * @Route("/updateContact/", name="updateContact")
     */
    public function updateContactAction(Request $request)
    {
        $this->getDoctrine()->getRepository(utilisateur::class)->updateContact($request);
        return $this->redirectToRoute('showOneContact', array('id' => $request->get('id')));
        
    }
    
    /**
     * @Route("/showAllOpportunites/", name="showAllOpportunites")
     */
    public function showAllOpportunitesAction(Request $request)
    {
        $allOpportunites = $this->getDoctrine()->getRepository(opportunite::class)->showAllOpportunites();
        return $this->render('default/mesopportunites.html.twig', array('allOpportunites' => $allOpportunites, 'EtatOpportunites'=> 'Actives'));
    }
    
    /**
     * @Route("/showAllArchivedOpportunites/", name="showAllArchivedOpportunites")
     */
    public function showAllArchivedOpportunitesAction(Request $request)
    {
        $allOpportunites = $this->getDoctrine()->getRepository(opportunite::class)->showArchivedOpportunites();
        return $this->render('default/mesopportunites.html.twig', array('allOpportunites' => $allOpportunites, 'EtatOpportunites'=> 'Archivées'));
    }
    
    /**
     * @Route("/archiveOneOpportunite/{id}/", name="archiveOneOpportunite", requirements={"id" = "\d+"})
     */
    public function archiveOneOpportuniteAction($id)
    {
        $OneOpportunite = $this->getDoctrine()->getRepository(opportunite::class)->archiveOpportunite($id);
        return $this->render('default/affichageopportunite.html.twig', array('OneOpportunite' => $OneOpportunite));
        
    }
    
    /**
     * @Route("/activeOneOpportunite/{id}/", name="activeOneOpportunite", requirements={"id" = "\d+"})
     */
    public function activeOneOpportuniteAction($id)
    {
        $OneOpportunite = $this->getDoctrine()->getRepository(opportunite::class)->activeOpportunite($id);
        return $this->render('default/affichageopportunite.html.twig', array('OneOpportunite' => $OneOpportunite));
        
    }
    
    /**
     * @Route("/showOneOpportunite/{id}/", name="showOneOpportunite", requirements={"id" = "\d+"})
     */
    public function showOneOpportuniteAction($id)
    {
        $OneOpportunite = $this->getDoctrine()->getRepository(opportunite::class)->showOneOpportunite($id);
        return $this->render('default/affichageopportunite.html.twig', array('OneOpportunite' => $OneOpportunite));
        
    }
    
    /**
     * @Route("/deleteOpportunite/{id}/", name="deleteOpportunite", requirements={"id" = "\d+"})
     */
    public function deleteOpportuniteAction($id)
    {
        $this->getDoctrine()->getRepository(opportunite::class)->deleteOpportunite($id);
        return $this->redirectToRoute('showAllOpportunites');
    }
    
    /**
     * @Route("/formAddOpportunite/", name="formAddOpportunite")
     */
    public function formAddOpportuniteAction(Request $request)
    {
        $allPartenairesLight = $this->getDoctrine()->getRepository(utilisateur::class)->showAllPartenairesLight();
        $allTechnologies = $this->getDoctrine()->getRepository(technologie::class)->showAllTechnologies();
        $allCandidatsLight = $this->getDoctrine()->getRepository(candidat::class)->showAllCandidatsLight();
        
        return $this->render('default/ajoutopportunite.html.twig', array('allTechnologies' => $allTechnologies, 'allPartenairesLight' => $allPartenairesLight, 'allCandidatsLight' => $allCandidatsLight));
    }
    
    /**
     * @Route("/addOpportunite/", name="addOpportunite")
     */
    public function addOpportuniteAction(Request $request)
    {
        $this->getDoctrine()->getRepository(opportunite::class)->addOpportunite($request);
        return $this->redirectToRoute('showAllOpportunites');
    }
    
    /**
     * @Route("/formUpdateOpportunite/{id}/", name="formUpdateOpportunite", requirements={"id" = "\d+"})
     */
    public function formUpdateOpportunite($id)
    {
        $allPartenairesLight = $this->getDoctrine()->getRepository(utilisateur::class)->showAllPartenairesLight();
        $allCandidatsLight = $this->getDoctrine()->getRepository(candidat::class)->showAllCandidatsLight();
        $allTechnologies = $this->getDoctrine()->getRepository(technologie::class)->showAllTechnologies();
        $OneOpportunite = $this->getDoctrine()->getRepository(opportunite::class)->showOneOpportunite($id);
        
        return $this->render('default/modificationopportunite.html.twig', array('allTechnologies' => $allTechnologies, 'allPartenairesLight' => $allPartenairesLight, 'allCandidatsLight' => $allCandidatsLight, 'OneOpportunite' => $OneOpportunite));
    }
    
    /**
     * @Route("/updateOpportunite/", name="updateOpportunite")
     */
    public function updateOpportuniteAction(Request $request)
    {
        $this->getDoctrine()->getRepository(opportunite::class)->updateOpportunite($request);
        return $this->redirectToRoute('showOneOpportunite', array('id' => $request->get('id')));
        
    }
    
    /**
     * @Route("/removeCandidatForOpportunite/{idOpportunite}/{idCandidat}/", name="removeCandidatForOpportunite", requirements={"idOpportunite" = "\d+" , "idCandidat" = "\d+"})
     */
    public function removeCandidatForOpportuniteAction($idOpportunite,$idCandidat)
    {
        $this->getDoctrine()->getRepository(opportunite::class)->removeCandidatForOpportunite($idOpportunite,$idCandidat);
        $OneOpportunite = $this->getDoctrine()->getRepository(opportunite::class)->showOneOpportunite($idOpportunite);
        
        return new JsonResponse(array('oneOpportunite' => $oneOpportunite));
    }
    
    /**
     * @Route("/removeTechnologieForOpportunite/{idOpportunite}/{idTechnologie}/", name="removeTechnologieForOpportunite", requirements={"idEntreprise" = "\d+" , "idTechnologie" = "\d+"})
     */
    public function removeTechnologieForOpportuniteAction($idOpportunite,$idTechnologie)
    {
        $this->getDoctrine()->getRepository(opportunite::class)->removeTechnologieForOpportunite($idOpportunite,$idTechnologie);
        $oneOpportunite = $this->getDoctrine()->getRepository(opportunite::class)->showOneOpportunite($idOpportunite);
        return new JsonResponse(array('detailsEntreprise' => $oneEntreprise));
    }
    
    /**
     * @Route("/showAllTechnologies/", name="showAllTechnologies")
     */
    public function showAllTechnologiesAction(Request $request)
    {
        $allTechnologies = $this->getDoctrine()->getRepository(technologie::class)->showAllTechnologies();
        return $this->render('default/lestechnologies.html.twig', array('allTechnologies' => $allTechnologies));
    }
    
    /**
     * @Route("/addTechnologie/", name="addTechnologie")
     */
    public function addTechnologieAction(Request $request)
    {
        $this->getDoctrine()->getRepository(technologie::class)->addTechnologie($request);
        return $this->redirectToRoute('showAllTechnologies');
    }
    
    /**
     * @Route("/updateTechnologie/", name="updateTechnologie")
     */
    public function updateTechnologieAction(Request $request)
    {
        $this->getDoctrine()->getRepository(technologie::class)->updateTechnologie($request);
        return $this->redirectToRoute('showAllTechnologies');
    }
    
    /**
     * @Route("/deleteTechnologie/{id}/", name="deleteTechnologie", requirements={"id" = "\d+"})
     */
    public function deleteTechnologieAction($id)
    {
        $this->getDoctrine()->getRepository(technologie::class)->deleteTechnologie($id);
        return $this->redirectToRoute('showAllTechnologies');
    }
    
    /**
     * @Route("/showAllEntreprises/", name="showAllEntreprises")
     */
    public function showAllEntreprisesAction(Request $request)
    {
        $allEntreprises = $this->getDoctrine()->getRepository(entreprise::class)->showAllEntreprises();
        $allTechnologies = $this->getDoctrine()->getRepository(technologie::class)->showAllTechnologies();
        return $this->render('default/lesentreprises.html.twig', array('allEntreprises' => $allEntreprises, 'allTechnologies' => $allTechnologies));
    }
    
    /**
     * @Route("/addEntreprise/", name="addEntreprise")
     */
    public function addEntrepriseAction(Request $request)
    {
        $this->getDoctrine()->getRepository(entreprise::class)->addEntreprise($request);
        return $this->redirectToRoute('showAllEntreprises');
    }
    
    /**
     * @Route("/updateEntreprise/", name="updateEntreprise")
     */
    public function updateEntrepriseAction(Request $request)
    {
        $this->getDoctrine()->getRepository(entreprise::class)->updateEntreprise($request);
        return $this->redirectToRoute('showAllEntreprises');
    }
    
    /**
     * @Route("/deleteEntreprise/{id}/", name="deleteEntreprise", requirements={"id" = "\d+"})
     */
    public function deleteEntrepriseAction($id)
    {
        $this->getDoctrine()->getRepository(entreprise::class)->deleteEntreprise($id);
        return $this->redirectToRoute('showAllEntreprises');
    }
    
    /**
     * @Route("/removeTechnologieForEntreprise/{idEntreprise}/{idTechnologie}/", name="removeTechnologieForEntreprise", requirements={"idEntreprise" = "\d+" , "idTechnologie" = "\d+"})
     */
    public function removeTechnologieForEntrepriseAction($idEntreprise,$idTechnologie)
    {
        $this->getDoctrine()->getRepository(entreprise::class)->removeTechnologieForEntreprise($idEntreprise,$idTechnologie);
        $oneEntreprise = $this->getDoctrine()->getRepository(entreprise::class)->showOneEntreprise($idEntreprise);
        return new JsonResponse(array('detailsEntreprise' => $oneEntreprise));
    }
    
    /**
     * @Route("/showAllEcoles/", name="showAllEcoles")
     */
    public function showAllEcolesAction(Request $request)
    {
        $allEcoles = $this->getDoctrine()->getRepository(ecole::class)->showAllEcoles();
        return $this->render('default/lesecoles.html.twig', array('allEcoles' => $allEcoles));
    }
    
    /**
     * @Route("/addEcole/", name="addEcole")
     */
    public function addEcoleAction(Request $request)
    {
        $this->getDoctrine()->getRepository(ecole::class)->addEcole($request);
        return $this->redirectToRoute('showAllEcoles');
    }
    
    /**
     * @Route("/updateEcole/", name="updateEcole")
     */
    public function updateEcoleAction(Request $request)
    {
        $this->getDoctrine()->getRepository(ecole::class)->updateEcole($request);
        return $this->redirectToRoute('showAllEcoles');
    }
    
    /**
     * @Route("/deleteEcole/{id}/", name="deleteEcole", requirements={"id" = "\d+"})
     */
    public function deleteEcoleAction($id)
    {
        $this->getDoctrine()->getRepository(ecole::class)->deleteEcole($id);
        return $this->redirectToRoute('showAllEcoles');
    }
    
    /**
     * @Route("/showAllCertifications/", name="showAllCertifications")
     */
    public function showAllCertificationsAction(Request $request)
    {
        $allCertifications = $this->getDoctrine()->getRepository(certification::class)->showAllCertifications();
        return $this->render('default/lescertifications.html.twig', array('allCertifications' => $allCertifications));
    }
    
    /**
     * @Route("/addCertification/", name="addCertification")
     */
    public function addCertificationAction(Request $request)
    {
        $this->getDoctrine()->getRepository(certification::class)->addCertification($request);
        return $this->redirectToRoute('showAllCertifications');
    }
    
    /**
     * @Route("/updateCertification/", name="updateCertification")
     */
    public function updateCertificationAction(Request $request)
    {
        $this->getDoctrine()->getRepository(certification::class)->updateCertification($request);
        return $this->redirectToRoute('showAllCertifications');
    }
    
    /**
     * @Route("/deleteCertification/{id}/", name="deleteCertification", requirements={"id" = "\d+"})
     */
    public function deleteCertificationAction($id)
    {
        $this->getDoctrine()->getRepository(certification::class)->deleteCertification($id);
        return $this->redirectToRoute('showAllCertifications');
    }
    
    /**
     * @Route("/showAllRappels/", name="showAllRappels")
     */
    public function showAllRappelsAction(Request $request)
    {
        $allRappels = $this->getDoctrine()->getRepository(rappel::class)->showAllRappels();
        return $this->render('default/mesrappels.html.twig', array('allRappels' => $allRappels));
    }
    
    /**
     * @Route("/addRappel/", name="addRappel")
     */
    public function addRappelAction(Request $request)
    {
        $this->getDoctrine()->getRepository(rappel::class)->addRappel($request);
        return $this->redirectToRoute('showAllRappels');
    }
    
    /**
     * @Route("/updateRappel/", name="updateRappel")
     */
    public function updateRappelAction(Request $request)
    {
        $this->getDoctrine()->getRepository(rappel::class)->updateRappel($request);
        return $this->redirectToRoute('showAllRappels');
    }
    
    /**
     * @Route("/deleteRappel/{id}/", name="deleteRappel", requirements={"id" = "\d+"})
     */
    public function deleteRappelAction($id)
    {
        $this->getDoctrine()->getRepository(rappel::class)->deleteRappel($id);
        return $this->redirectToRoute('showAllRappels');
    }
    
    /**
     * @Route("/deleteRappelFromHomepage/{id}/", name="deleteRappelFromHomepage", requirements={"id" = "\d+"})
     */
    public function deleteRappelFromHomepageAction($id)
    {
        $this->getDoctrine()->getRepository(rappel::class)->deleteRappel($id);
        return $this->redirectToRoute('accueil');
    }
    
    /**
     * @Route("/exit/", name="exit")
     */
    public function exitAction(Request $request)
    {
        //$session = $this->get('session');
        //$session->invalidate();
        return $this->render('default/index.html.twig');
    }
}
