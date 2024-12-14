/*
'B' - Buttons (botones)
'f' - filtering/search (caja de búsqueda)
'r' - processing (indicador de procesamiento)
't' - table (la tabla)
'i' - information (información de registros)
'p' - pagination (paginación)*/

$('#user-table').DataTable({
    autoWidth: false,
    dom: '<"row justify-content-between align-items-center"' +
         '<"col-12 col-md-2 dataTables_number"l>' +
         '<"col-12 col-md-5 dataTables_filter"f>' +
         '>' +
         '<"row"<"col-sm-12"tr>>' +
         '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
    
    responsive: true,
    language: {
 
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
    },
    pageLength: 10,
    order: [[0, 'asc']],
    classes: {
        sWrapper: "dataTables_wrapper dt-bootstrap5",
        sFilterInput: "form-control",
        sLengthSelect: "form-select form-select-sm"
    }
});