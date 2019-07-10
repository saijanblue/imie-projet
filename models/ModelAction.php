<?php

include "../classes/database.php";

class ModelAction {

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

    public function __construct($id) {
        $this->db = $GLOBALS["db"];

    }

    public function loadAction($id) {
        $sql = "SELECT * FROM action WHERE id='" . $id . "'";

        $result = $this->db->request($sql)[0];

        $this->id = $result["id"];
        $this->rythme_formation = $result["rythme_formation"];
        $this->niveaux_entree_obligatoire = $result["niveaux_entree_obligatoire"];
        $this->modalite_alternance = $result["modalite_alternance"];
        $this->modalite_enseignement = $result["modalite_enseignement"];
        $this->condition_specific = $result["condition_specific"];
        $this->possibilites_prises_charge = $result["possibilites_prises_charge"];
        $this->lieu_formation = $result["lieu_formation"];
        $this->modalite_entrees_sorties = $result["modalite_entrees_sorties"];
        $this->formation = $result["formation"];
        $this->restauration = $result["restauration"];
        $this->hebergement = $result["hebergement"];
        $this->transport = $result["transport"];
        $this->acces_handicapes = $result["acces_handicapes"];
        $this->langues_formation = $result["langues_formation"];
        $this->modalite_recrutement = $result["modalite_recrutement"];
        $this->modalite_pedagogique = $result["modalite_pedagogique"];
        $this->frais_restant = $result["frais_restant"];
        $this->prix_total_ttc = $result["prix_total_ttc"];
        $this->duree_indicative = $result["duree_indicative"];
        $this->nombre_heures_centre = $result["nombre_heures_centre"];
        $this->nombre_heures_entreprise = $result["nombre_heures_entreprise"];
        $this->nombre_heures_total = $result["nombre_heures_total"];
        $this->conditions_prise_charge = $result["conditions_prise_charge"];
        $this->conventionnement = $result["conventionnement"];
        $this->duree_conventionnee = $result["duree_conventionnee"];
        $this->organisme_formateur = $result["organisme_formateur"];
        $this->financement_formation = $result["financement_formation"];
        $this->nombre_places = $result["nombre_places"];
        $this->moyens_pedagogiques = $result["moyens_pedagogiques"];
        $this->responsable_enseignement = $result["responsable_enseignement"];
        $this->heures_cours = $result["heures_cours"];
        $this->heures_td = $result["heures_td"];
        $this->heures_tp_non_tuteur = $result["heures_tp_non_tuteur"];
        $this->heures_tp_tuteur = $result["heures_tp_tuteur"];

        return true;
    }

    public function saveAction($flag) {
        if ($flag === "update"){
            $sql = "UPDATE action";
            $sql .= "SET rythme_formation = :rythme_formation,";
            $sql .= "SET niveaux_entree_obligatoire = :niveaux_entree_obligatoire,";
            $sql .= "SET modalite_alternance = :modalite_alternance,";
            $sql .= "SET conditions_specifique = :conditions_specifique,";
            $sql .= "SET possibilites_prises_charge = :possibilites_prises_charge,";
            $sql .= "SET lieu_formation = :lieu_formation,";
            $sql .= "SET modalite_entrees_sorties = :modalite_entrees_sorties,";
            $sql .= "SET formation = :formation,";
            $sql .= "SET restauration = :restauration,";
            $sql .= "SET hebergement = :hebergement,";
            $sql .= "SET transport = :transport,";
            $sql .= "SET acces_handicapes = :acces_handicapes,";
            $sql .= "SET langue_formation = :langue_formation,";
            $sql .= "SET modalite_recrutement = :modalite_recrutement,";
            $sql .= "SET frais_restant = :frais_restant,";
            $sql .= "SET prix_total_ttc = :prix_total_ttc,";
            $sql .= "SET duree_indicative = :duree_indicative,";
            $sql .= "SET nombre_heures_centre = :nombre_heures_centre,";
            $sql .= "SET nombre_heures_entreprise = :nombre_heures_entreprise,";
            $sql .= "SET nombre_heures_total = :nombre_heures_total,";
            $sql .= "SET conditions_prise_charge = :conditions_prise_charge,";
            $sql .= "SET conventionnement = :conventionnement,";
            $sql .= "SET duree_conventionnee = :duree_conventionnee,";
            $sql .= "SET organisme_formateur = :organisme_formateur,";
            $sql .= "SET financement_formation = :financement_formation,";
            $sql .= "SET nombre_places = :nombre_places,";
            $sql .= "SET moyens_pedagogiques = :moyens_pedagogiques,";
            $sql .= "SET responsable_enseignement = :responsable_enseignement,";
            $sql .= "SET heures_cours = :heures_cours,";
            $sql .= "SET heures_td = :heures_td,";
            $sql .= "SET heures_tp_tuteur = :heures_tp_tuteur,";
            $sql .= "SET heures_tp_non_tuteur = :heures_tp_non_tuteur,";
            $sql .= "SET user_updated = :user_updated,";
            $sql .= "SET date_updated = :date_updated";
            $sql .= "WHERE id = :id";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->bindParam(':rythme_formation', $this->rythme_formation, PDO::PARAM_STR);
            $stmt->bindParam(':niveaux_entree_obligatoire', $this->niveaux_entree_obligatoire, PDO::PARAM_INT);
            $stmt->bindParam(':modalite_alternance', $this->modalite_alternance, PDO::PARAM_STR);
            $stmt->bindParam(':modalite_enseignement', $this->modalite_enseignement, PDO::PARAM_INT);
            $stmt->bindParam(':conditions_specifiques', $this->condition_specific, PDO::PARAM_STR);
            $stmt->bindParam(':possibilites_prises_charge', $this->possibilites_prises_charge, PDO::PARAM_INT);
            $stmt->bindParam(':lieu_formation', $this->lieu_formation, PDO::PARAM_INT);
            $stmt->bindParam(':modalite_entrees_sorties', $this->modalite_entrees_sorties, PDO::PARAM_INT);
            $stmt->bindParam(':formation', $this->formation, PDO::PARAM_INT);
            $stmt->bindParam(':restauration', $this->restauration, PDO::PARAM_STR);
            $stmt->bindParam(':hebergement', $this->hebergement, PDO::PARAM_STR);
            $stmt->bindParam(':transport', $this->transport, PDO::PARAM_STR);
            $stmt->bindParam(':acces_handicapes', $this->acces_handicapes, PDO::PARAM_STR);
            $stmt->bindParam(':langue_formation', $this->langues_formation, PDO::PARAM_STR);
            $stmt->bindParam(':modalite_recrutement', $this->modalite_recrutement, PDO::PARAM_STR);
            $stmt->bindParam(':modalite_pedagogique', $this->modalite_pedagogique, PDO::PARAM_STR);
            $stmt->bindParam(':frais_restant', $this->frais_restant, PDO::PARAM_STR);
            $stmt->bindParam(':prix_total_ttc', $this->prix_total_ttc, PDO::PARAM_STR);
            $stmt->bindParam(':duree_indicative', $this->duree_indicative, PDO::PARAM_STR);
            $stmt->bindParam(':nombre_heures_centre', $this->nombre_heures_centre, PDO::PARAM_STR);
            $stmt->bindParam(':nombre_heures_entreprise', $this->nombre_heures_entreprise, PDO::PARAM_STR);
            $stmt->bindParam(':nombre_heures_total', $this->nombre_heures_total, PDO::PARAM_STR);
            $stmt->bindParam(':conditions_prise_charge', $this->conditions_prise_charge, PDO::PARAM_STR);
            $stmt->bindParam(':conventionnement', $this->conventionnement, PDO::PARAM_INT);
            $stmt->bindParam(':duree_conventionnee', $this->duree_conventionnee, PDO::PARAM_STR);
            $stmt->bindParam(':organisme_formateur', $this->organisme_formateur, PDO::PARAM_INT);
            $stmt->bindParam(':financement_formation', $this->financement_formation, PDO::PARAM_STR);
            $stmt->bindParam(':nombres_places', $this->nombre_places, PDO::PARAM_STR);
            $stmt->bindParam(':moyens_pedagogiques', $this->moyens_pedagogiques, PDO::PARAM_STR);
            $stmt->bindParam(':responsable_enseignement', $this->responsable_enseignement, PDO::PARAM_INT);
            $stmt->bindParam(':heures_cours', $this->heures_cours, PDO::PARAM_STR);
            $stmt->bindParam(':heures_td', $this->heures_td, PDO::PARAM_STR);
            $stmt->bindParam(':heures_tp_tuteur', $this->heures_tp_tuteur, PDO::PARAM_STR);
            $stmt->bindParam(':heures_tp_non_tuteur', $this->heures_tp_non_tuteur, PDO::PARAM_STR);
            //$stmt->bindParam(':user_updated', User::getId(), PDO::PARAM_INT);
            //$stmt->bindParam(':date_updated', new Date(), PDO::PARAM_INT);

            $stmt->execute();
        } else if ($flag === "insert"){
            $sql = "INSERT INTO action(rythme_formation,niveaux_entree_obligatoire,modalite_alternance,modalite_enseignement,conditions_specifiques,possibilites_prises_charge,lieu_formation,modalite_entrees_sorties,formation,restauration,hebergement,transport,acces_handicapes,langues_formation,modalite_recrutement,modalite_pedagogique,frais_restant,prix_total_ttc,duree_indicative,nombre_heures_centre,nombre_heures_entreprise,nombre_heures_total,conditions_prise_charge,conventionnement,duree_conventionnee,organisme_formateur,financement_formation,nombres_places,moyens_pedagogiques,responsable_enseignement,heures_cours,heures_td,heures_tp_tuteur,heures_tp_non_tuteur)";
            $sql .= "VALUES(:rythme_formation,:niveaux_entree_obligatoire,:modalite_alternance,:modalite_enseignement,:conditions_specifiques,:possibilites_prises_charge,:lieu_formation,:modalite_entrees_sorties,:formation,:restauration,:hebergement,:transport,:acces_handicapes,:langues_formation,:modalite_recrutement,:modalite_pedagogique,:frais_restant,:prix_total_ttc,:duree_indicative,:nombre_heures_centre,:nombre_heures_entreprise,:nombre_heures_total,:conditions_prise_charge,:conventionnement,:duree_conventionnee,:organisme_formateur,:financement_formation,:nombres_places,:moyens_pedagogiques,:responsable_enseignement,:heures_cours,:heures_td,:heures_tp_tuteur,:heures_tp_non_tuteur)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->bindParam(':rythme_formation', $this->rythme_formation, PDO::PARAM_STR);
            $stmt->bindParam(':niveaux_entree_obligatoire', $this->niveaux_entree_obligatoire, PDO::PARAM_INT);
            $stmt->bindParam(':modalite_alternance', $this->modalite_alternance, PDO::PARAM_STR);
            $stmt->bindParam(':modalite_enseignement', $this->modalite_enseignement, PDO::PARAM_INT);
            $stmt->bindParam(':conditions_specifiques', $this->condition_specific, PDO::PARAM_STR);
            $stmt->bindParam(':possibilites_prises_charge', $this->possibilites_prises_charge, PDO::PARAM_INT);
            $stmt->bindParam(':lieu_formation', $this->lieu_formation, PDO::PARAM_INT);
            $stmt->bindParam(':modalite_entrees_sorties', $this->modalite_entrees_sorties, PDO::PARAM_INT);
            $stmt->bindParam(':formation', $this->formation, PDO::PARAM_INT);
            $stmt->bindParam(':restauration', $this->restauration, PDO::PARAM_STR);
            $stmt->bindParam(':hebergement', $this->hebergement, PDO::PARAM_STR);
            $stmt->bindParam(':transport', $this->transport, PDO::PARAM_STR);
            $stmt->bindParam(':acces_handicapes', $this->acces_handicapes, PDO::PARAM_STR);
            $stmt->bindParam(':langue_formation', $this->langues_formation, PDO::PARAM_STR);
            $stmt->bindParam(':modalite_recrutement', $this->modalite_recrutement, PDO::PARAM_STR);
            $stmt->bindParam(':modalite_pedagogique', $this->modalite_pedagogique, PDO::PARAM_STR);
            $stmt->bindParam(':frais_restant', $this->frais_restant, PDO::PARAM_STR);
            $stmt->bindParam(':prix_total_ttc', $this->prix_total_ttc, PDO::PARAM_STR);
            $stmt->bindParam(':duree_indicative', $this->duree_indicative, PDO::PARAM_STR);
            $stmt->bindParam(':nombre_heures_centre', $this->nombre_heures_centre, PDO::PARAM_STR);
            $stmt->bindParam(':nombre_heures_entreprise', $this->nombre_heures_entreprise, PDO::PARAM_STR);
            $stmt->bindParam(':nombre_heures_total', $this->nombre_heures_total, PDO::PARAM_STR);
            $stmt->bindParam(':conditions_prise_charge', $this->conditions_prise_charge, PDO::PARAM_STR);
            $stmt->bindParam(':conventionnement', $this->conventionnement, PDO::PARAM_INT);
            $stmt->bindParam(':duree_conventionnee', $this->duree_conventionnee, PDO::PARAM_STR);
            $stmt->bindParam(':organisme_formateur', $this->organisme_formateur, PDO::PARAM_INT);
            $stmt->bindParam(':financement_formation', $this->financement_formation, PDO::PARAM_STR);
            $stmt->bindParam(':nombres_places', $this->nombre_places, PDO::PARAM_STR);
            $stmt->bindParam(':moyens_pedagogiques', $this->moyens_pedagogiques, PDO::PARAM_STR);
            $stmt->bindParam(':responsable_enseignement', $this->responsable_enseignement, PDO::PARAM_INT);
            $stmt->bindParam(':heures_cours', $this->heures_cours, PDO::PARAM_STR);
            $stmt->bindParam(':heures_td', $this->heures_td, PDO::PARAM_STR);
            $stmt->bindParam(':heures_tp_tuteur', $this->heures_tp_tuteur, PDO::PARAM_STR);
            $stmt->bindParam(':heures_tp_non_tuteur', $this->heures_tp_non_tuteur, PDO::PARAM_STR);


            $stmt->execute();
        } else {
            $sql = "UPDATE action";
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
        $sql = "SELECT * FROM action_code WHERE id_action='" . $this->id . "'";
        $codePublicVises = array();
        $results = $this->db->request($sql);

        foreach ($results as $key => $value) {
            $sql2 = "SELECT * FROM code WHERE id='" . $value['id_code'] . "'";
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
        $sql = "SELECT * FROM dict_boolean WHERE id='" . $this->niveaux_entree_obligatoire . "'";
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
        $sql = "SELECT * FROM dict_modalites_enseignement WHERE id='" . $this->modalite_enseignement . "'";
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
        $sql = "SELECT * FROM dict_boolean WHERE id='" . $this->possibilites_prises_charge . "'";
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
        $sql = "SELECT * FROM coordonnees WHERE id='" . $this->lieu_formation . "'";
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
        $sql = "SELECT * FROM dicte_modalte_es WHERE id='" . $this->modalite_entrees_sorties . "'";
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
        $sql = "SELECT * FROM formation WHERE id='" . $this->formation . "'";
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
        $sql = "SELECT * FROM dict_boolean WHERE id='" . $this->conventionnement . "'";
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
        $sql = "SELECT * FROM organisme_formateur WHERE id='" . $this->organisme_formateur . "'";
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
        $sql = "SELECT * FROM action_organisme_financeur WHERE id_action='" . $this->id . "'";
        $orgaFinanceurs = array();
        $results = $this->db->request($sql);
        foreach ($results as $key => $value) {
            $sql2 = "SELECT * FROM organisme_financeur WHERE id='" . $value['id_organisme_financeur'] . "'";
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
        $sql = "SELECT * FROM coordonnees WHERE id='" . $this->responsable_enseignement . "'";
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

    public function getSessions() {
        $sql = "SELECT * FROM session WHERE action='" . $this->id . "'";
        return $this->db->request($sql);
    }


}