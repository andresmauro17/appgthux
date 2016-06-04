$(document).ready(function () {
    $(function () {
        $('#username').focus(); // Focus to the username field on body loads
        $('#login').click(function () { // Create `click` event function for login
            var username = $('#username'); // Get the username field
            var password = $('#password'); // Get the password field
            var login_result = $('.login_result'); // Get the login result div
            login_result.html('loading..'); // Set the pre-loader can be an animation
            if (username.val() == '') { // Check the username values is empty or not
                username.focus(); // focus to the filed
                login_result.html('<span class="error">Escriba el nombre de usuario</span>');
                return false;
            }
            if (password.val() == '') { // Check the password value is empty or not
                password.focus();
                login_result.html('<span class="error">Escriba la clave</span>');
                return false;
            }
            if (username.val() != '' && password.val() != '') { // Check the username and password values is not empty and make the ajax request
                var UrlToPass = 'action=login&username=' + username.val() + '&password=' + password.val();
                login_result.html('<span class="error">Ya hizo validacion</span>');

                $.ajax({// Send the credential values to another checker.php using Ajax in POST menthod
                    type: 'POST',
                    data: UrlToPass,
                    url: 'checker.php',
                    success: function (responseText) { // Get the result and asign to each cases
                        if (responseText == 0) {
                            login_result.html('<span class="error">Usuario o clave incorrecto!</span>');
                        }
                        else if (responseText == 1) {
                            window.location = 'userpage.php';
                        }
                        else {
                            alert('Problema con sql query');
                        }
                    }
                });
            }
            return false;
        });

    });


    $(function () {
        var oEmp = '2';
         $('#nevera').dataTable({
             "language": {
                 "lengthMenu": "Mostrar _MENU_ registros por pagina",
                 "zeroRecords": "No hay datos para mostrar",
                 "info": "Pagina _PAGE_ de _PAGES_",
                 "infoEmpty": "No hay datos disponibles",
                 "infoFiltered": "(filtrado de _MAX_ registros totales)",
                 "search": "Buscar:",
                 "loadingRecords": "Cargando...",
                 "processing": "Procesando...",
                 "paginate": {
                     "first": "Primero",
                     "last": "Ultimo",
                     "next": "Siguiente",
                     "previous": "Anterior"}
             },
             "responsive": true,
             "bProcessing": true,
             "sAjaxSource": "leeDatos.php",
             "order": [[0, "desc"]],
             "aoColumns": [
                 {mData: 'nevera'},
                 {mData: 'ciudad'},
                 {mData: 'nombre'},
                 {mData: 'hora'},
                 {mData: 'fecha'},
                 {mData: 'temper'},
                 {mData: 'humed'},
                 {mData: 'energia'}
             ]
         });

         $('#nevera').on('click', 'tbody tr', function () {
             //
             oTable = $('#nevera').dataTable();
             var sData = oTable.fnGetData(this);
             //alert( 'The cell clicked on had the value of '+sData["nevera"] );
             window.location.href = "detallenevera.php?id=" + sData["nevera"] + "&nm=" + sData["nombre"] + "&ci=" + sData["ciudad"];
         });


         $('#btnbuscar').click(function () {
             if ($('#fec1').val() == "") {
                 var dat = new Date();
                 var dia = dat.getDate();
                 var mes = dat.getMonth() + 1;
                 var ano = dat.getFullYear();
                 $('#fec1').val(ano.toString() + "-" + mes.toString() + "-" + dia.toString());
                 $('#fec2').val($('#fec1').val());
             }
             if ($('#fec2').val()==""){
                 var dat = new Date();
                 var dia = dat.getDate();
                 var mes = dat.getMonth() + 1;
                 var ano = dat.getFullYear();
                 $('#fec2').val(ano.toString() + "-" + mes.toString() + "-" + dia.toString());                
             }
             if ($('#fec1').val()>$('#fec2').val()){
                 $('#fec2').val($('#fec1').val());
             }

             var oNev = $('#idNev').val();
             var ofec1 = $('#fec1').val();
             var ofec2 = $('#fec2').val();
             $('#detallenevera').dataTable({
                 "language": {
                     "lengthMenu": "Mostrar _MENU_ registros por pagina",
                     "zeroRecords": "No hay datos para mostrar",
                     "info": "Pagina _PAGE_ de _PAGES_",
                     "infoEmpty": "No hay datos disponibles",
                     "infoFiltered": "(filtrado de _MAX_ registros totales)",
                     "search": "Buscar:",
                     "loadingRecords": "Cargando...",
                     "processing": "Procesando...",
                     "paginate": {
                         "first": "Primero",
                         "last": "Ultimo",
                         "next": "Siguiente",
                         "previous": "Anterior"}
                 },
                 "destroy": true,
                 "bProcessing": true,
                 "sAjaxSource": "leeDatosDetalle.php?id=" + oNev + "&fec1=" + ofec1 + "&fec2=" + ofec2,
                 "order": [[0, "desc"]],
                 "aoColumns": [
                     {mData: 'hora'},
                     {mData: 'fecha'},
                     {mData: 'temper'},
                     {mData: 'humed'},
                     {mData: 'energia'}
                 ]
             });
             drawchart();

         });



         $('#usuarios').dataTable({
             "language": {
                 "lengthMenu": "Mostrar _MENU_ registros por pagina",
                 "zeroRecords": "No hay datos para mostrar",
                 "info": "Pagina _PAGE_ de _PAGES_",
                 "infoEmpty": "No hay datos disponibles",
                 "infoFiltered": "(filtrado de _MAX_ registros totales)",
                 "search": "Buscar:",
                 "loadingRecords": "Cargando...",
                 "processing": "Procesando...",
                 "paginate": {
                     "first": "Primero",
                     "last": "Ultimo",
                     "next": "Siguiente",
                     "previous": "Anterior"}
             },
             "bProcessing": true,
             "sAjaxSource": "leeUsuarios.php",
             "order": [[0, "desc"]],
             "aoColumns": [
                 {mData: 'idSesion'},
                 {mData: 'empresa'},
                 {mData: 'login'},
                 {mData: 'idUsu'},
                 {mData: 'fecha'},
                 {mData: 'hora_ini'},
                 {mData: 'hora_fin'}
             ]
         });
    });


});

function drawchart() {

    var oNev = $('#idNev').val();
    var ofec1 = $('#fec1').val();
    var ofec2 = $('#fec2').val();
    // JSONP request
    var jsonData = $.ajax({
        url: 'leeDatosGraficoTemp.php',
        data: "id=" + oNev + "&fec1=" + ofec1 + "&fec2=" + ofec2,
        dataType: 'json',
    }).done(function (results) {

        if (results != 0) {
            var data = new google.visualization.DataTable();
            var datos = results.aaData;

            data.addColumn('datetime', 'Time');
            data.addColumn('number', 'Temp');

            for (i = 0; i < results.aaData.length; i++)
            {
                data.addRow([
                    (new Date(datos[i]["hora"])),
                    parseFloat(datos[i]["temper"])
                ])
            }

            var chart = new google.visualization.LineChart($('#chart-div').get(0));

            chart.draw(data, {
                title: 'Temperaturas durante el día'
            });

        }

    });


}