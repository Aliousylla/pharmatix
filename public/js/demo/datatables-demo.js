// Call the dataTables jQuery plugin
// $(document).ready(function() {
//   $('#dataTable').DataTable();
// });


$(document).ready(function() {
  $('#datatable').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
    },
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "dom": 'Bfrtip',
    "buttons": [
      'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  });
});