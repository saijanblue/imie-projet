<?php

include "../classes/database.php";

class Action {

    private $id;
    private $code_public_vise;
    private $niveaux_entree_obligatoire;
    private $modalite_alternance;
    private $modalite_enseignement;
    private $condition_specific;
    private $possibilites_prises_charge;
    private $lieu_formation;
    private $modalite_entrees_sorties;
    private $formation;
    private $restauration;
    private $hebergement;
    private $transport;
    private $acces_handicapes;
    private $langues_formation;
    private $modalite_recrutement;
    private $modalite_pedagogique;
    private $frais_restant;
    private $prix_total_ttc;
    private $duree_indicative;
    private $nombre_heures_centre;
    private $nombre_heures_entreprise;
    private $nombre_heures_total;
    private $conditions_prise_charge;
    private $conventionnement;
    private $duree_conventionnee;
    private $organisme_formateur;
    private $organisme_financeur;
    private $financement_formation;
    private $nombre_places;
    private $moyens_pedagogiques;
    private $responsable_enseignement;
    private $heures_cours;
    private $heures_td;
    private $heures_tp_tuteur;
    private $heures_tp_non_tuteur;

    private $rythme_formation;

    private $db;
    public function __construct(){
        $this->db = new database($_SESSION["Role"]);
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRythmeFormation() {
        return $this->rythme_formation;
    }

    /**
     * @param mixed $rythme_formation
     */
    public function setRythmeFormation($rythme_formation) {
        $this->rythme_formation = $rythme_formation;
    }

    /**
     * @return mixed
     */
    public function getCodePublicVise() {
        $sql = "SELECT * FROM action_code WHERE id_action='".$this->id."'";
        $codePublicVises = array();
        $results = $this->db->request($sql);

        foreach ($results as $key => $value){
            $sql2 = "SELECT * FROM code WHERE id='".$value['id_code']."'";
            $codePublicVises[] = $this->db->request($sql2);
        }

        return $codePublicVises;

    }

    /**
     * @param mixed $code_public_vise
     */
    public function setCodePublicVise($code_public_vise) {
        $this->code_public_vise = $code_public_vise;
    }

    /**
     * @return mixed
     */
    public function getNiveauxEntreeObligatoire() {
        $sql = "SELECT * FROM dict_boolean WHERE id='".$this->niveaux_entree_obligatoire."'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $niveaux_entree_obligatoire
     */
    public function setNiveauxEntreeObligatoire($niveaux_entree_obligatoire) {
        $this->niveaux_entree_obligatoire = $niveaux_entree_obligatoire;
    }

    /**
     * @return mixed
     */
    public function getModaliteAlternance() {
        return $this->modalite_alternance;
    }

    /**
     * @param mixed $modalite_alternance
     */
    public function setModaliteAlternance($modalite_alternance) {
        $this->modalite_alternance = $modalite_alternance;
    }

    /**
     * @return mixed
     */
    public function getModaliteEnseignement() {
        $sql = "SELECT * FROM dict_modalites_enseignement WHERE id='".$this->modalite_enseignement."'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $modalite_enseignement
     */
    public function setModaliteEnseignement($modalite_enseignement) {
        $this->modalite_enseignement = $modalite_enseignement;
    }

    /**
     * @return mixed
     */
    public function getConditionSpecific() {
        return $this->condition_specific;
    }

    /**
     * @param mixed $condition_specific
     */
    public function setConditionSpecific($condition_specific) {
        $this->condition_specific = $condition_specific;
    }

    /**
     * @return mixed
     */
    public function getPossibilitesPrisesCharge() {
        $sql = "SELECT * FROM dict_boolean WHERE id='".$this->possibilites_prises_charge."'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $possibilites_prises_charge
     */
    public function setPossibilitesPrisesCharge($possibilites_prises_charge) {
        $this->possibilites_prises_charge = $possibilites_prises_charge;
    }

    /**
     * @return mixed
     */
    public function getLieuFormation() {
        $sql = "SELECT * FROM coordonnees WHERE id='".$this->lieu_formation."'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $lieu_formation
     */
    public function setLieuFormation($lieu_formation) {
        $this->lieu_formation = $lieu_formation;
    }

    /**
     * @return mixed
     */
    public function getModaliteEntreesSorties() {
        $sql = "SELECT * FROM dicte_modalte_es WHERE id='".$this->modalite_entrees_sorties."'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $modalite_entrees_sorties
     */
    public function setModaliteEntreesSorties($modalite_entrees_sorties) {
        $this->modalite_entrees_sorties = $modalite_entrees_sorties;
    }

    /**
     * @return mixed
     */
    public function getFormation() {
        $sql = "SELECT * FROM formation WHERE id='".$this->formation."'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $formation
     */
    public function setFormation($formation) {
        $this->formation = $formation;
    }

    /**
     * @return mixed
     */
    public function getRestauration() {
        return $this->restauration;
    }

    /**
     * @param mixed $restauration
     */
    public function setRestauration($restauration) {
        $this->restauration = $restauration;
    }

    /**
     * @return mixed
     */
    public function getHebergement() {
        return $this->hebergement;
    }

    /**
     * @param mixed $hebergement
     */
    public function setHebergement($hebergement) {
        $this->hebergement = $hebergement;
    }

    /**
     * @return mixed
     */
    public function getTransport() {
        return $this->transport;
    }

    /**
     * @param mixed $transport
     */
    public function setTransport($transport) {
        $this->transport = $transport;
    }

    /**
     * @return mixed
     */
    public function getAccesHandicapes() {
        return $this->acces_handicapes;
    }

    /**
     * @param mixed $acces_handicapes
     */
    public function setAccesHandicapes($acces_handicapes) {
        $this->acces_handicapes = $acces_handicapes;
    }

    /**
     * @return mixed
     */
    public function getLanguesFormation() {
        return $this->langues_formation;
    }

    /**
     * @param mixed $langues_formation
     */
    public function setLanguesFormation($langues_formation) {
        $this->langues_formation = $langues_formation;
    }

    /**
     * @return mixed
     */
    public function getModaliteRecrutement() {
        return $this->modalite_recrutement;
    }

    /**
     * @param mixed $modalite_recrutement
     */
    public function setModaliteRecrutement($modalite_recrutement) {
        $this->modalite_recrutement = $modalite_recrutement;
    }

    /**
     * @return mixed
     */
    public function getModalitePedagogique() {
        return $this->modalite_pedagogique;
    }

    /**
     * @param mixed $modalite_pedagogique
     */
    public function setModalitePedagogique($modalite_pedagogique) {
        $this->modalite_pedagogique = $modalite_pedagogique;
    }

    /**
     * @return mixed
     */
    public function getFraisRestant() {
        return $this->frais_restant;
    }

    /**
     * @param mixed $frais_restant
     */
    public function setFraisRestant($frais_restant) {
        $this->frais_restant = $frais_restant;
    }

    /**
     * @return mixed
     */
    public function getPrixTotalTtc() {
        return $this->prix_total_ttc;
    }

    /**
     * @param mixed $prix_total_ttc
     */
    public function setPrixTotalTtc($prix_total_ttc) {
        $this->prix_total_ttc = $prix_total_ttc;
    }

    /**
     * @return mixed
     */
    public function getDureeIndicative() {
        return $this->duree_indicative;
    }

    /**
     * @param mixed $duree_indicative
     */
    public function setDureeIndicative($duree_indicative) {
        $this->duree_indicative = $duree_indicative;
    }

    /**
     * @return mixed
     */
    public function getNombreHeuresCentre() {
        return $this->nombre_heures_centre;
    }

    /**
     * @param mixed $nombre_heures_centre
     */
    public function setNombreHeuresCentre($nombre_heures_centre) {
        $this->nombre_heures_centre = $nombre_heures_centre;
    }

    /**
     * @return mixed
     */
    public function getNombreHeuresEntreprise() {
        return $this->nombre_heures_entreprise;
    }

    /**
     * @param mixed $nombre_heures_entreprise
     */
    public function setNombreHeuresEntreprise($nombre_heures_entreprise) {
        $this->nombre_heures_entreprise = $nombre_heures_entreprise;
    }

    /**
     * @return mixed
     */
    public function getNombreHeuresTotal() {
        return $this->nombre_heures_total;
    }

    /**
     * @param mixed $nombre_heures_total
     */
    public function setNombreHeuresTotal($nombre_heures_total) {
        $this->nombre_heures_total = $nombre_heures_total;
    }

    /**
     * @return mixed
     */
    public function getConditionsPriseCharge() {
        return $this->conditions_prise_charge;
    }

    /**
     * @param mixed $conditions_prise_charge
     */
    public function setConditionsPriseCharge($conditions_prise_charge) {
        $this->conditions_prise_charge = $conditions_prise_charge;
    }

    /**
     * @return mixed
     */
    public function getConventionnement() {
        $sql = "SELECT * FROM dict_boolean WHERE id='".$this->conventionnement."'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $conventionnement
     */
    public function setConventionnement($conventionnement) {
        $this->conventionnement = $conventionnement;
    }

    /**
     * @return mixed
     */
    public function getDureeConventionnee() {
        return $this->duree_conventionnee;
    }

    /**
     * @param mixed $duree_conventionnee
     */
    public function setDureeConventionnee($duree_conventionnee) {
        $this->duree_conventionnee = $duree_conventionnee;
    }

    /**
     * @return mixed
     */
    public function getOrganismeFormateur() {
        $sql = "SELECT * FROM organisme_formateur WHERE id='".$this->organisme_formateur."'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $organisme_formateur
     */
    public function setOrganismeFormateur($organisme_formateur) {
        $this->organisme_formateur = $organisme_formateur;
    }

    /**
     * @return mixed
     */
    public function getOrganismeFinanceur() {
        $sql = "SELECT * FROM action_organisme_financeur WHERE id_action='".$this->id."'";
        $orgaFinanceurs = array();
        $results = $this->db->request($sql);
        foreach ($results as $key => $value){
            $sql2 = "SELECT * FROM organisme_financeur WHERE id='".$value['id_organisme_financeur']."'";
            $orgaFinanceurs[] = $this->db->request($sql2);
        }

        return $orgaFinanceurs;
    }

    /**
     * @param mixed $organisme_financeur
     */
    public function setOrganismeFinanceur($organisme_financeur) {
        $this->organisme_financeur = $organisme_financeur;
    }

    /**
     * @return mixed
     */
    public function getFinancementFormation() {
        return $this->financement_formation;
    }

    /**
     * @param mixed $financement_formation
     */
    public function setFinancementFormation($financement_formation) {
        $this->financement_formation = $financement_formation;
    }

    /**
     * @return mixed
     */
    public function getNombrePlaces() {
        return $this->nombre_places;
    }

    /**
     * @param mixed $nombre_places
     */
    public function setNombrePlaces($nombre_places) {
        $this->nombre_places = $nombre_places;
    }

    /**
     * @return mixed
     */
    public function getMoyensPedagogiques() {
        return $this->moyens_pedagogiques;
    }

    /**
     * @param mixed $moyens_pedagogiques
     */
    public function setMoyensPedagogiques($moyens_pedagogiques) {
        $this->moyens_pedagogiques = $moyens_pedagogiques;
    }

    /**
     * @return mixed
     */
    public function getResponsableEnseignement() {
        $sql = "SELECT * FROM coordonnees WHERE id='".$this->responsable_enseignement."'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $responsable_enseignement
     */
    public function setResponsableEnseignement($responsable_enseignement) {
        $this->responsable_enseignement = $responsable_enseignement;
    }

    /**
     * @return mixed
     */
    public function getHeuresCours() {
        return $this->heures_cours;
    }

    /**
     * @param mixed $heures_cours
     */
    public function setHeuresCours($heures_cours) {
        $this->heures_cours = $heures_cours;
    }

    /**
     * @return mixed
     */
    public function getHeuresTd() {
        return $this->heures_td;
    }

    /**
     * @param mixed $heures_td
     */
    public function setHeuresTd($heures_td) {
        $this->heures_td = $heures_td;
    }

    /**
     * @return mixed
     */
    public function getHeuresTpTuteur() {
        return $this->heures_tp_tuteur;
    }

    /**
     * @param mixed $heures_tp_tuteur
     */
    public function setHeuresTpTuteur($heures_tp_tuteur) {
        $this->heures_tp_tuteur = $heures_tp_tuteur;
    }

    /**
     * @return mixed
     */
    public function getHeuresTpNonTuteur() {
        return $this->heures_tp_non_tuteur;
    }

    /**
     * @param mixed $heures_tp_non_tuteur
     */
    public function setHeuresTpNonTuteur($heures_tp_non_tuteur) {
        $this->heures_tp_non_tuteur = $heures_tp_non_tuteur;
    }

    public function getSessions(){
        $sql = "SELECT * FROM session WHERE action='".$this->id."'";
        return $this->db->request($sql);
    }


}