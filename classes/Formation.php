<?php

include "./models/ModelFormation.php";
include "./models/ModelCodification.php";
include "Vue.php";

class Formation {

    public $formation;

    function __construct() {
        $this->formation = new ModelFormation();


    }


    public function getAllFormations() {
        $result = $this->formation->getAllFormation();

        foreach ($result as $key => $val) {
            $this->formation->loadFormation($val["id"]);
            $result[$key]["certifiante"] = $this->formation->getCertifiante()[0][1];
            $result[$key]["contact_formation"] = $this->formation->getContactFormation()[0][1];
            $result[$key]["parcours_formation"] = $this->formation->getParcoursFormation()[0][1];
            $result[$key]["code_niveau_entree"] = $this->formation->getCodeNiveauEntree()[0][1];
            $result[$key]["code_niveau_sortie"] = $this->formation->getCodeNiveauSortie()[0][1];
            $result[$key]["url_formation"] = $this->formation->getUrlFormation()[0][1];
            $result[$key]["organisme_formation_responsable"] = $this->formation->getOrganismeFormationResponsable()[0][1];
            $result[$key]["sous_modules"] = $this->formation->getSousModules()[0][1];
            $result[$key]["modules_prerequis"] = $this->formation->getModulesPrerequis()[0][1];
        }

        echo json_encode($result);
        return $result;
    }

    public function create() {
        $this->formation->setDomaineFormation($_POST['domaine_formation']);
        $this->formation->setObjectifFormation($_POST['objectif_formation']);
        $this->formation->setResultatsAttendus($_POST['resultats_attendus']);
        $this->formation->setContenuFormation($_POST['contenu_formation']);
        $this->formation->setCertifiante($_POST['certifiante']);
        $this->formation->setContactFormation($_POST['contact_formation']);
        $this->formation->setParcoursFormation($_POST['parcours_formation']);
        $this->formation->setCodeNiveauEntree($_POST['code_niveau_sortie']);
        $this->formation->setCodeNiveauSortie($_POST['code_niveau_entree']);
        $this->formation->setUrlFormation($_POST['url_formation']);
        $this->formation->setOrganismeFormationResponsable($_POST['organisme_formation_responsable']);
        $this->formation->setSousModules($_POST['sous_modules']);
        $this->formation->setModulesPrerequis($_POST['modules_prerequis']);
        $this->formation->setEligibiliteCpf($_POST['eligibilite_cpf']);
        $this->formation->setValidation($_POST['validation']);
        return $this->formation->saveFormation("insert");
    }

    public function delete() {
        $this->formation->setId($_POST['id']);
        return $this->formation->saveFormation("delete");
    }

    public function update() {
        //$this->formation->setId($_POST['id']);
        if ($_POST['domaine_formation']) {
            $this->formation->setDomaineFormation($_POST['domaine_formation']);
        }
        if ($_POST['objectif_formation']) {
            $this->formation->setObjectifFormation($_POST['objectif_formation']);
        }
        if ($_POST['resultats_attendus']) {
            $this->formation->setResultatsAttendus($_POST['resultats_attendus']);
        }
        if ($_POST['contenu_formation']) {
            $this->formation->setContenuFormation($_POST['contenu_formation']);
        }
        if ($_POST['certifiante']) {
            $this->formation->setCertifiante($_POST['certifiante']);
        }
        if ($_POST['contact_formation']) {
            $this->formation->setContactFormation($_POST['contact_formation']);
        }
        if ($_POST['parcours_formation']) {
            $this->formation->setParcoursFormation($_POST['parcours_formation']);
        }
        if ($_POST['code_niveau_sortie']) {
            $this->formation->setCodeNiveauEntree($_POST['code_niveau_sortie']);
        }
        if ($_POST['code_niveau_entree']) {
            $this->formation->setCodeNiveauSortie($_POST['code_niveau_entree']);
        }
        if ($_POST['url_formation']) {
            $this->formation->setUrlFormation($_POST['url_formation']);
        }
        if ($_POST['organisme_formation_responsable']) {
            $this->formation->setOrganismeFormationResponsable($_POST['organisme_formation_responsable']);
        }
        if ($_POST['sous_modules']) {
            $this->formation->setSousModules($_POST['sous_modules']);
        }
        if ($_POST['modules_prerequis']) {
            $this->formation->setModulesPrerequis($_POST['modules_prerequis']);
        }
        if ($_POST['eligibilite_cpf']) {
            $this->formation->setEligibiliteCpf($_POST['eligibilite_cpf']);
        }
        if ($_POST['validation']) {
            $this->formation->setValidation($_POST['validation']);
        }
        return true;
    }

    public function save() {
        return $this->formation->saveFormation("update");
    }
    public function gridFormation() {
        Vue::AfficherVue("Header");
        Vue::AfficherVue("HeaderNav");
        Vue::AfficherVue("Formation/formation");
        Vue::AfficherVue("Footer");
    }
    public function newFormation() {
        Vue::AfficherVue("Header");
        Vue::AfficherVue("HeaderNav");
        Vue::AfficherVue("Formation/offre");
        Vue::AfficherVue("Footer");
    }

    public function editFormation($id) {
        $this->formation->loadFormation($id);
        $codification = new ModelCodification();

        $data = array();
        $data['formation'] = $this->formation;
        $data['codification'] = $codification;
        Vue::AfficherVue("Header");
        Vue::AfficherVue("HeaderNav");
        Vue::AfficherVue("Formation/offre",$data);
        Vue::AfficherVue("Footer");
    }

}