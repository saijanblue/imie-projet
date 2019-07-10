var editor;

$(document).ready(function () {
    var table = $('#table-domain').DataTable({
        dom: 'Blfrtip',
        "autoWidth": false,
        "fixedHeader": true,
        "ordering": true,
        "responsive": true,
        "pageLength": 50,
        "processing": false,
        "serverSide": true,
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
        "ajax": "./ajax/formation_script.php",
        "language":
            {search: ""},
        "columns": [

            {data: 'formation.domaine_formation'},
            {data: 'formation.objectif_formation'},
            {data: 'formation.resultats_attendus'},
            {data: 'formation.contenu_formation'},
            {data: 'dict_boolean.val'},
            {data: 'coordonnees.nom'},
            {data: 'dict_type_parcours.val'},
            {data: 'dne.val'},
            {data: 'dns.val'},
            { data: null },
            {data: 'organisme_formation_responsable.nom_organisme'},
            {data: 'formation.eligibilite_cpf'},
            {data: 'formation.validation'},
            {
                "data": "formation.id",
                "render": function(data, type, row, meta){
                    debugger;
                    data = '<a href="formation/edit/offre' + data + '">Editer </a>' +
                        '<a href="formation/delete/' + data + '">Supprimer </a>' +
                        '<a href="formation/list/' + data + '">Actions</a>';
                    return data;
                }
            }

            // { data: 'details' }
        ],
        "buttons": [
            {
                extend: 'csv',
                text: 'Export CSV',
                className: 'btn-space',
                exportOptions: {
                    orthogonal: null
                }
            },
        ]


    });

    // $('.dataTables_filter input').addClass('search-input full').attr('placeholder','Search');
    //
     $(".option-col").on( 'click', function (e) {
         e.preventDefault();
         // var choiceCol = $(this).attr('value');
         var column = table.column($(this).attr("value")+':data');
         column.visible( ! column.visible() );
     } );

});