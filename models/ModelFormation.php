<?php


class ModelFormation {

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

    public function loadFormation($id){
        $sql = "SELECT * FROM formation WHERE id='" . $id . "'";

        $result = $this->db->request($sql)[0];

        $this->domaine_formation = $result["domaine_formation"];
        $this->objectif_formation = $result["objectif_formation"];
        $this->resultats_attendus = $result["resultats_attendus"];
        $this->contenu_formation = $result["contenu_formation"];
        $this->certifiante = $result["certifiante"];
        $this->contact_formation = $result["contact_formation"];
        $this->parcours_formation = $result["parcours_formation"];
        $this->code_niveau_entree = $result["code_niveau_entree"];
        $this->code_niveau_sortie = $result["code_niveau_sortie"];
        $this->url_formation = $result["url_formation"];
        $this->organisme_formation_responsable = $result["organisme_formation_responsable"];
        $this->sous_modules = $result["sous_modules"];
        $this->modules_prerequis = $result["modules_prerequis"];
        $this->eligibilite_cpf = $result["eligibilite_cpf"];
        $this->validation = $result["validation"];
    }

    public function getAllFormation() {
        $sql = "SELECT * FROM formation";
        $result = $this->db->request($sql);
        if ($result){
            return $result;
        }
    }

    public function saveFormation($flag) {
        if ($flag === "update"){
            $sql = "UPDATE formation";
            $sql .= "SET domaine_formation = :domaine_formation,";
            $sql .= "SET objectif_formation = :objectif_formation,";
            $sql .= "SET resultats_attendus = :resultats_attendus,";
            $sql .= "SET contenu_formation = :contenu_formation,";
            $sql .= "SET certifiante = :certifiante,";
            $sql .= "SET contact_formation = :contact_formation,";
            $sql .= "SET parcours_formation = :parcours_formation,";
            $sql .= "SET code_niveau_entree = :code_niveau_entree,";
            $sql .= "SET code_niveau_sortie = :code_niveau_sortie,";
            $sql .= "SET url_formation = :url_formation,";
            $sql .= "SET organisme_formation_responsable = :organisme_formation_responsable,";
            $sql .= "SET sous_modules = :sous_modules,";
            $sql .= "SET modules_prerequis = :modules_prerequis,";
            $sql .= "SET eligibilite_cpf = :eligibilite_cpf,";
            $sql .= "SET validation = :validation,";
            $sql .= "SET user_updated = :user_updated,";
            $sql .= "SET date_updated = :date_updated";
            $sql .= "WHERE id = :id";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->bindParam(':domaine_formation', $this->domaine_formation, PDO::PARAM_INT);
            $stmt->bindParam(':objectif_formation', $this->objectif_formation, PDO::PARAM_STR);
            $stmt->bindParam(':resultats_attendus', $this->resultats_attendus, PDO::PARAM_STR);
            $stmt->bindParam(':contenu_formation', $this->contenu_formation, PDO::PARAM_STR);
            $stmt->bindParam(':certifiante', $this->certifiante, PDO::PARAM_INT);
            $stmt->bindParam(':contenu_formation', $this->contenu_formation, PDO::PARAM_INT);
            $stmt->bindParam(':parcours_formation', $this->parcours_formation, PDO::PARAM_INT);
            $stmt->bindParam(':code_niveau_entree', $this->code_niveau_entree, PDO::PARAM_INT);
            $stmt->bindParam(':code_niveau_sortie', $this->code_niveau_sortie, PDO::PARAM_INT);
            $stmt->bindParam(':url_formation', $this->url_formation, PDO::PARAM_INT);
            $stmt->bindParam(':organisme_formation_responsable', $this->organisme_formation_responsable, PDO::PARAM_INT);
            $stmt->bindParam(':sous_modules', $this->sous_modules, PDO::PARAM_INT);
            $stmt->bindParam(':modules_prerequis', $this->modules_prerequis, PDO::PARAM_INT);
            $stmt->bindParam(':eligibilite_cpf', $this->eligibilite_cpf, PDO::PARAM_STR);
            $stmt->bindParam(':validation', $this->validation, PDO::PARAM_STR);
            //$stmt->bindParam(':user_updated', User::getId(), PDO::PARAM_INT);
            //$stmt->bindParam(':date_updated', new Date(), PDO::PARAM_STR);

            $stmt->execute();
        } else if ($flag === "insert"){
            $sql = "INSERT INTO formation(domaine_formation,objectif_formation,resultats_attendus,contenu_formation,certifiante,contact_formation,parcours_formation,code_niveau_entree,code_niveau_sortie,url_formation,organisme_formation_responsable,sous_modules,modules_prerequis,eligibilite_cpf,validation,user_created,date_created)";
            $sql .= "VALUES(:domaine_formation,:objectif_formation,:resultats_attendus,:contenu_formation,:certifiante,:contact_formation,:parcours_formation,:code_niveau_entree,:code_niveau_sortie,:url_formation,:organisme_formation_responsable,:sous_modules,:modules_prerequis,:eligibilite_cpf,:validation,:user_created,:date_created)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':domaine_formation', $this->domaine_formation, PDO::PARAM_INT);
            $stmt->bindParam(':objectif_formation', $this->objectif_formation, PDO::PARAM_STR);
            $stmt->bindParam(':resultats_attendus', $this->resultats_attendus, PDO::PARAM_STR);
            $stmt->bindParam(':contenu_formation', $this->contenu_formation, PDO::PARAM_STR);
            $stmt->bindParam(':certifiante', $this->certifiante, PDO::PARAM_INT);
            $stmt->bindParam(':contenu_formation', $this->contenu_formation, PDO::PARAM_INT);
            $stmt->bindParam(':parcours_formation', $this->parcours_formation, PDO::PARAM_INT);
            $stmt->bindParam(':code_niveau_entree', $this->code_niveau_entree, PDO::PARAM_INT);
            $stmt->bindParam(':code_niveau_sortie', $this->code_niveau_sortie, PDO::PARAM_INT);
            $stmt->bindParam(':url_formation', $this->url_formation, PDO::PARAM_INT);
            $stmt->bindParam(':organisme_formation_responsable', $this->organisme_formation_responsable, PDO::PARAM_INT);
            $stmt->bindParam(':sous_modules', $this->sous_modules, PDO::PARAM_INT);
            $stmt->bindParam(':modules_prerequis', $this->modules_prerequis, PDO::PARAM_INT);
            $stmt->bindParam(':eligibilite_cpf', $this->eligibilite_cpf, PDO::PARAM_STR);
            $stmt->bindParam(':validation', $this->validation, PDO::PARAM_STR);
            //$stmt->bindParam(':user_created', User::getId(), PDO::PARAM_INT);
            //$stmt->bindParam(':date_created', new Date(), PDO::PARAM_STR);

            $stmt->execute();
        } else {
            $sql = "UPDATE formation";
            $sql .= "SET deleted = 1";
            $sql .= "WHERE id = :id";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->execute();
        }

        return true;
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
        $result = $this->db->request($sql);
        if ($result){
            return $result;
        }
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
        $result = $this->db->request($sql);
        if ($result){
            return $result;
        }
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
        $result = $this->db->request($sql);
        if ($result){
            return $result;
        }
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
        $result = $this->db->request($sql);
        if ($result){
            return $result;
        }
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
        $result = $this->db->request($sql);
        if ($result){
            return $result;
        }
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
        $result = $this->db->request($sql);
        if ($result){
            return $result;
        }
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
        $result = $this->db->request($sql);
        if ($result){
            return $result;
        }
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
        $result = $this->db->request($sql);
        if ($result){
            return $result;
        }
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
        $result = $this->db->request($sql);
        if ($result){
            return $result;
        }
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
        $result = $this->db->request($sql);
        if ($result){
            return $result;
        }
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
        $result = $this->db->request($sql);
        if ($result){
            return $result;
        }
    }
}