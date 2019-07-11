<?php

//require('SSP.php');
include( "../public/lib/Editor/lib/DataTables.php" );

use DataTables\Editor;

// DB table to use
//$table = 'formation';
//
//// Table's primary key
//$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
Editor::inst($db,'formation','id')
    ->fields(
        Editor\Field::inst('formation.id'),
        Editor\Field::inst('formation.intitule_formation'),
        Editor\Field::inst('formation.domaine_formation'),
        Editor\Field::inst('formation.objectif_formation'),
        Editor\Field::inst('formation.resultats_attendus'),
        Editor\Field::inst('formation.contenu_formation'),
        Editor\Field::inst('formation.certifiante')->options(Editor\Options::inst()->table('dict_boolean')->value('id')->label('val')),
        Editor\Field::inst('dict_boolean.val'),
        Editor\Field::inst('formation.contact_formation')->options(Editor\Options::inst()->table('coordonnees')->value('id')->label(array('nom','prenom','email'))),
        Editor\Field::inst('coordonnees.nom'),
        Editor\Field::inst('coordonnees.prenom'),
        Editor\Field::inst('coordonnees.email'),
        Editor\Field::inst('formation.parcours_formation')->options(Editor\Options::inst()->table('dict_type_parcours')->value('id')->label('val')),
        Editor\Field::inst('dict_type_parcours.val'),
        Editor\Field::inst('formation.code_niveau_entree')->options(Editor\Options::inst()->table('dict_niveaux')->value('id')->label('val')),
        Editor\Field::inst('dne.val'),
        Editor\Field::inst('formation.code_niveau_sortie')->options(Editor\Options::inst()->table('dict_niveaux')->value('id')->label('val')),
        Editor\Field::inst('dns.val'),
//        Editor\Field::inst('formation.url_formation')->options(Editor\Options::inst()->table('url_formation')->value('id')->label('val')),
        Editor\Field::inst('formation.organisme_formation_responsable')->options(Editor\Options::inst()->table('organisme_formation_responsable')->value('id')->label('nom_organisme')),
        Editor\Field::inst('organisme_formation_responsable.nom_organisme'),
        Editor\Field::inst('formation.eligibilite_cpf'),
        Editor\Field::inst('formation.validation')
    )
    ->leftJoin('dict_boolean','dict_boolean.id','=',' formation.certifiante')
    ->leftJoin('coordonnees ','coordonnees.id','=','formation.contact_formation')
    ->leftJoin('dict_type_parcours','dict_type_parcours.id','=','formation.parcours_formation')
    ->leftJoin('dict_niveaux as dne','dne.id','=','formation.code_niveau_entree')
    ->leftJoin('dict_niveaux as dns','dns.id','=','formation.code_niveau_sortie')
    ->leftJoin('organisme_formation_responsable','organisme_formation_responsable.id','=','formation.organisme_formation_responsable')
    ->process($_POST)
    ->json ();






//$columns = array(
//    array('db' => 'domaine_formation', 'dt' => 0),
//    array('db' => 'objectif_formation', 'dt' => 1),
//    array('db' => 'resultats_attendus', 'dt' => 2),
//    array('db' => 'contenu_formation', 'dt' => 3),
//    array('db' => 'certifiante', 'dt' => 4),
//    array('db' => 'contact_formation', 'dt' => 5,),
//    array('db' => 'parcours_formation', 'dt' => 6,),
//    array('db' => 'code_niveau_entree', 'dt' => 7,),
//    array('db' => 'code_niveau_sortie', 'dt' => 8,),
//    array('db' => 'url_formation', 'dt' => 9,),
//    array('db' => 'organisme_formation_responsable', 'dt' => 10,),
//    array('db' => 'eligibilite_cpf', 'dt' => 11,),
//    array('db' => 'validation', 'dt' => 12,),
//
//
//);
//
//// SQL server connection information
//$sql_details = array(
//    'user' => 'root',
//    'pass' => '',
//    'db' => 'wise',
//    'host' => 'localhost'
//);
//
//// Include SQL query processing class
////require( './classes/SSP.php' );
//
//// Output data as json format
//echo json_encode(
//    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
//);