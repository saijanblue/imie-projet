<?php


class formation {

    private $id;
    private $domaine_formation;
    private $objectif_formation;
    private $resultats_attendus;
    private $contenu_formation;
    private $certifiante;
    private $contact_formation;
    private $parcours_formation;
    private $code_niveau_entree;
    private $code_niveau_sortie;
    private $url_formation;
    private $organisme_formation_responsable;
    private $sous_modules;
    private $modules_prerequis;
    private $eligibilite_cpf;
    private $validation;
    private $db;


    public function __construct() {
        $this->db = $GLOBALS["db"];

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
    public function getDomaineFormation() {
        $sql = "SELECT * FROM domaine_formation WHERE id='" . $this->domaine_formation . "'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $domaine_formation
     */
    public function setDomaineFormation($domaine_formation) {
        $this->domaine_formation = $domaine_formation;
    }

    /**
     * @return mixed
     */
    public function getObjectifFormation() {
        return $this->objectif_formation;
    }

    /**
     * @param mixed $objectif_formation
     */
    public function setObjectifFormation($objectif_formation) {
        $this->objectif_formation = $objectif_formation;
    }

    /**
     * @return mixed
     */
    public function getResultatsAttendus() {
        return $this->resultats_attendus;
    }

    /**
     * @param mixed $resultats_attendus
     */
    public function setResultatsAttendus($resultats_attendus) {
        $this->resultats_attendus = $resultats_attendus;
    }

    /**
     * @return mixed
     */
    public function getContenuFormation() {
        return $this->contenu_formation;
    }

    /**
     * @param mixed $contenu_formation
     */
    public function setContenuFormation($contenu_formation) {
        $this->contenu_formation = $contenu_formation;
    }

    /**
     * @return mixed
     */
    public function getCertifiante() {
        $sql = "SELECT * FROM dict_boolean WHERE id='" . $this->certifiante . "'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $certifiante
     */
    public function setCertifiante($certifiante) {
        $this->certifiante = $certifiante;
    }

    /**
     * @return mixed
     */
    public function getContactFormation() {
        $sql = "SELECT * FROM coordonnees WHERE id='" . $this->contact_formation . "'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $contact_formation
     */
    public function setContactFormation($contact_formation) {
        $this->contact_formation = $contact_formation;
    }

    /**
     * @return mixed
     */
    public function getParcoursFormation() {
        $sql = "SELECT * FROM dict_type_parcours WHERE id='" . $this->parcours_formation . "'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $parcours_formation
     */
    public function setParcoursFormation($parcours_formation) {
        $this->parcours_formation = $parcours_formation;
    }

    /**
     * @return mixed
     */
    public function getCodeNiveauEntree() {
        $sql = "SELECT * FROM dict_niveaux WHERE id='" . $this->code_niveau_entree . "'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $code_niveau_entree
     */
    public function setCodeNiveauEntree($code_niveau_entree) {
        $this->code_niveau_entree = $code_niveau_entree;
    }

    /**
     * @return mixed
     */
    public function getCodeNiveauSortie() {
        $sql = "SELECT * FROM dict_niveaux WHERE id='" . $this->code_niveau_sortie . "'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $code_niveau_sortie
     */
    public function setCodeNiveauSortie($code_niveau_sortie) {
        $this->code_niveau_sortie = $code_niveau_sortie;
    }

    /**
     * @return mixed
     */
    public function getUrlFormation() {
        $sql = "SELECT * FROM url_formation WHERE id='" . $this->url_formation . "'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $url_formation
     */
    public function setUrlFormation($url_formation) {
        $this->url_formation = $url_formation;
    }

    /**
     * @return mixed
     */
    public function getOrganismeFormationResponsable() {
        $sql = "SELECT * FROM organisme_formation_responsable WHERE id='" . $this->organisme_formation_responsable . "'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $organisme_formation_responsable
     */
    public function setOrganismeFormationResponsable($organisme_formation_responsable) {
        $this->organisme_formation_responsable = $organisme_formation_responsable;
    }

    /**
     * @return mixed
     */
    public function getSousModules() {
        $sql = "SELECT * FROM sous_modules WHERE id='" . $this->sous_modules . "'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $sous_modules
     */
    public function setSousModules($sous_modules) {
        $this->sous_modules = $sous_modules;
    }

    /**
     * @return mixed
     */
    public function getModulesPrerequis() {
        $sql = "SELECT * FROM modules_prerequis WHERE id='" . $this->modules_prerequis . "'";
        return $this->db->request($sql);
    }

    /**
     * @param mixed $modules_prerequis
     */
    public function setModulesPrerequis($modules_prerequis) {
        $this->modules_prerequis = $modules_prerequis;
    }

    /**
     * @return mixed
     */
    public function getEligibiliteCpf() {
        return $this->eligibilite_cpf;
    }

    /**
     * @param mixed $eligibilite_cpf
     */
    public function setEligibiliteCpf($eligibilite_cpf) {
        $this->eligibilite_cpf = $eligibilite_cpf;
    }

    /**
     * @return mixed
     */
    public function getValidation() {
        return $this->validation;
    }

    /**
     * @param mixed $validation
     */
    public function setValidation($validation) {
        $this->validation = $validation;
    }


    public function getCertifications() {
        $sql = "SELECT * FROM formation_certification WHERE id_formation='" . $this->id . "'";
        $certifs = array();
        $results = $this->db->request($sql);
        foreach ($results as $key => $value) {
            $sql2 = "SELECT * FROM certification WHERE id='" . $value['id_certification'] . "'";
            $certifs[] = $this->db->request($sql2);
        }

        return $certifs;
    }

    public function getActions() {
        $sql = "SELECT * FROM action WHERE formation='" . $this->id . "'";
        $results = $this->db->request($sql);
    }
}