$(document).ready(function(){
    //$('#example').DataTable();
$('#multi-filter-select').DataTable({
    "language":{
       "lengthMenu":"Mostrar _MENU_  Registros",
       "zeroRecords":"no se encontraron resultados",
       "info":"registros del _START_ al _END_ de un total de _TOTAL_ registros",
       "infoEmpty":"no hay registros",
       "infoFiltered":"(filtrado de un total de MAX registros)",
       "sSearch":"GENERAR REPORTE POR BUSQUEDA:",
       "oPaginate":{
          "sFirst":"primero",
          "sLast":"ultimo",
          "sNext":"siguiente",
          "sPrevious":"anterior"
       },
       "sProcessing":"procesando....",
    },
    responsive: "true",
    dom: 'Bfrtilp',       
    buttons:[ 
     {
        extend:    'excelHtml5',
        text:      '<i class="fas fa-file-excel fa-1.5x"></i>    Reporte ',
        titleAttr: 'Exportar a Excel',
        className: 'btn btn-success'
     }
      
  ]
  });
});