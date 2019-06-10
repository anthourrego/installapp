/* Filtro de Datos */
$(function() {
  $('#input-search').on('keyup', function() {
      var rex = new RegExp($(this).val(), 'i');
      $('.searchable-container .items').hide();
      $('.searchable-container .items').filter(function() {
          return rex.test($(this).text());
      }).show();
  });

  $('#input-searchSoft').on('keyup', function () {
    var rex = new RegExp($(this).val(), 'i');
    $('.searchable-containerSoft .itemsSoft').hide();
    $('.searchable-containerSoft .itemsSoft').filter(function () {
      return rex.test($(this).text());
    }).show();
  });
});

function textoBlanco(texto){
  return texto.val().replace(/\s/g,"").length;
}

function definirdataTable(nombreDataTable) {
  // =======================  Data tables ==================================
  $(nombreDataTable).DataTable({
    "language": {
        "decimal": "",
        "emptyTable": "No hay datos disponibles en la tabla",
        "info": "Mostrando _START_ desde _END_ hasta _TOTAL_ registros",
        "infoEmpty": "Mostrando 0 desde 0 hasta 0 registros",
        "infoFiltered": "(Filtrado por _MAX_ total)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "No se encontraron registros",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
    stateSave: true,
    "processing": true
  });
}

function acutes(cadena) {

  var resp = cadena.replace(/&aacute;/g, "á").replace(/&eacute;/g, "é").replace(/&iacute;/g, "í").replace(/&oacute;/g, "ó").replace(/&uactue;/g, "ú").replace(/&Aacute;/g, "Á").replace(/&Eacute;/g, "É").replace(/&Iacute;/g, "Í").replace(/&Oacute;/g, "Ó").replace(/&Uacute;/g, "Ú").replace(/&ntilde;/g, "ñ").replace(/&Ntilde;/g, "Ñ");

  return resp;
}