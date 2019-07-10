<?php


class ModelCodification {

    private $id;
    private $val;
    public $type;

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
    public function getVal() {
        return $this->val;
    }

    /**
     * @param mixed $val
     */
    public function setVal($val) {
        $this->val = $val;
    }

    /**
     * @return mixed
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type) {
        $this->type = $type;
    }


    public function getList($type){
        $table = false;
        switch($type){
            case "bool":
                $table = "dict_boolean";
                break;
            case "etat_recrutement":
                $table = "dict_etat_recrutement";
                break;
            case "financeurs":
                $table = "dict_financeurs";
                break;
            case "modalites_enseignement":
                $table = "dict_modalites_enseignement";
                break;
            case "modalites_es":
                $table = "dict_modalites_es";
                break;
            case "niveaux":
                $table = "dict_niveaux";
                break;
            case "perimetre":
                $table = "dict_perimetre_recrutement";
                break;
            case "module":
                $table = "dict_type_module";
                break;
            case "parcours":
                $table = "dict_type_parcours";
                break;
            case "positionnement":
                $table = "dict_type_positionnement";
                break;
        }

        $sql = "SELECT * FROM $table";
        return $this->db->request($sql);

    }

}