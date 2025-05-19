// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
      lengthMenu: [10, 25, 50],
      "language": {
          "lengthMenu": "Mostrando _MENU_ entradas.",  
          "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
          "infoEmpty": "No hay registros disponibles",
          "infoFiltered": "(filtrado de _MAX_ registros en total)",
          "search": "Buscar:",
          "paginate": {
              "first": "Primero",
              "last": "Último",
              "next": "<i class='bi bi-arrow-right'></i>",
              "previous": "<i class='bi bi-arrow-left'></i>"
          },
          "zeroRecords": "No se encontraron resultados"
      }
  });
});