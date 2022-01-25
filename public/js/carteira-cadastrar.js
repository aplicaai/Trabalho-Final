// $(document).ready(function() {
//     $('#scr-vtr-dynamic').dataTable({ "bFilter": false});
// });

$('#scr-vtr-dynamic').DataTable({
    scrollY: '50vh',
    scrollCollapse: true,
    paging: false,
    bFilter: false,
    lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
    language: {
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json"
    //   processing: '<i class="ace-icon fa fa-spinner fa-spin orange bigger-500" style="font-size:60px;margin-top:50px;"></i>'
    },
});