$(document).ready(function () {
    var table = $('#table-domain').DataTable({
        dom: 'Blfrtip',
        "autoWidth": false,
        "fixedHeader": true,
        "ordering": false,
        "responsive": true,
        "paging": true,
        "searching": true,
        "pageLength": 50,
        "search": true,
        "language":
            {
                "search": "",
                "lengthMenu": "Affichage de _MENU_ résultats par page",
                "zeroRecords": "Rien a été trouvé - Veuillez nous excuser",
                "info": "Page _PAGE_ sur _PAGES_",
                "infoEmpty": "Pas d'enregistrement disponible",
                "infoFiltered": "(filtré de _MAX_ enregistrements)",
                "loadingRecords": "Chargement...",
                "paginate": {
                    "first": "Premier résultat",
                    "last": "Dernier résultat",
                    "next": "Suivant",
                    "previous": "Précédent"
                },
            },
        "processing": false,
        "serverSide": true,
        "ajax": "./ajax/formation_script.php",
        "columns": [

            {data: 'formation.intitule_formation'},
            {data: 'formation.domaine_formation'},
            {data: 'formation.objectif_formation'},
            {data: 'formation.resultats_attendus'},
            {data: 'formation.contenu_formation'},
            {data: 'dict_boolean.val'},
            {data: 'coordonnees.email'},
            {data: 'dict_type_parcours.val'},
            {data: 'dne.val'},
            {data: 'dns.val'},
            // {data: null},
            // {data: 'organisme_formation_responsable.nom_organisme'},
            // {data: 'formation.eligibilite_cpf'},
            // {data: 'formation.validation'},
            {
                "data": "formation.id",
                "render": function (data, type, row, meta) {
                    data =
                        '<a href="formation/detail/' + data + '">Détail </a>' +
                        '<a href="formation/edit/offre/' + data + '">Editer </a>' +
                        '<a href="formation/delete/' + data + '">Supprimer </a>' +
                        '<a href="formation/list/' + data + '">Actions</a>';
                    return data;
                }
            }

            // { data: 'details' }
        ],
        "buttons": [{
            extend: 'csv',
            text: 'Export CSV',
        }, {
            extend: 'excel',
            text: 'Export XSL',
        },
            {
                text: 'Nouveau',
                className: "btn btn-secondary",
                action: function (e, dt, node, config) {
                    window.location.href = "formation/new/offre";
                }
                }],


    });

    // $('.dataTables_filter input').addClass('search-input full').attr('placeholder','Search');
    //
    $(".option-col").on('click', function (e) {
        e.preventDefault();
        // var choiceCol = $(this).attr('value');
        var column = table.column($(this).attr("value") + ':data');
        column.visible(!column.visible());
    });

});