<?php

include "Vue.php";
include "./models/ModelFormation.php";

class Formation {

    public $formation;

    function __construct() {
        $this->formation = new ModelFormation();
        $params = array();
        $params["formations"] = $this->getAllFormations();

        Vue::AfficherVue("Header");
        Vue::AfficherVue("HeaderNav");
        Vue::AfficherVue("Formation/Formation",$params);
        Vue::AfficherVue("Footer");
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
        return $this->formation->save("insert");
    }

    public function delete() {
        $this->formation->setId($_POST['id']);
        return $this->formation->save("delete");
    }

    public function update() {
        $this->formation->setId($_POST['id']);
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
        return $this->formation->save("update");
    }

}