// app.js
$(document).ready(function () {

    // transform table-results into datatable
    $('#table-results').DataTable({
        paging: true,
        ordering: true,
        pageLength: 10,
        pagingType: "full_numbers",

        // datatable in portuguese language
        language: {
            decimal: "",
            emptyTable: "Nenhum registro encontrado",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 a 0 de 0 registros",
            infoFiltered: "(Filtrado de _MAX_ registros totais)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Mostrar _MENU_ registros",
            search: "Pesquisar:",
            zeroRecords: "Nenhum registro encontrado",
            paginate: {
                first: "Primeiro",
                last: "Último",
                next: "Próximo",
                previous: "Anterior"
            }
        }
    });
});