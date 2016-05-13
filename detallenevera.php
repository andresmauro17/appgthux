<?php
require_once "templates/template.php";
up();
?>
<div class="as_wrapper">
    <h4>Bienvenido usuario: <b><?php echo ucfirst($_SESSION['username']); ?></b>, Click <a href="logout.php" class="as_button" role="button" >aqu&iacute; para salir correctamente del sistema.<br></a></h4>
    <h4>Click <a href="userpage.php" class="as_button" role="button">aqu&iacute; para retornar</a></h4>
</div>
<script>
    $(document).ready(function () {
        //alert($('#fec1').val());
        if (!$('#fec1').val()) {
            var dat = new Date();
            var dia = dat.getDate();
            var mes = dat.getMonth() + 1;
            var ano = dat.getFullYear();
            $('#fec1').val(ano.toString() + "-" + mes.toString() + "-" + dia.toString());
            $('#fec2').val($('#fec1').val());

        }
    });
    // load chart lib
    google.load('visualization', '1', {
        packages: ['corechart']
    });

    // call drawChart once google charts is loaded
    google.setOnLoadCallback(drawchart);
</script>
<div>
    <?php
    date_default_timezone_set('America/Bogota');

    $date = date('Y/m/d H:i:s');
    echo 'Por favor escoja el rango de fechas para visualizar el detalle de la nevera. Fecha Actual: ' . $date;
    echo '<br>';
    $idNevera = $_GET["id"];
    $nmCiudad = $_GET["ci"];
    $nmNevera = $_GET["nm"];
    echo '<h3>Nevera: ' . $idNevera . ' ' . $nmNevera . ' Ciudad: ' . $nmCiudad . '</h3>';
    ?>

</div>
<br>    <br>    
<input type="hidden" id="idNev" value="<?php echo $idNevera ?>"/>
<div>
    <table class="responsive" width="60%">
        <tr>
            <td>
                <div class="col-xs-4">
                    <label for="fec1">Fecha Inicial:</label>
                    <input class="form-control" id="fec1" type="date">
                </div>           
            </td>
            <td>
                <div class="col-xs-4">
                    <label for="fec2">Fecha Final:</label>
                    <input class="form-control" id="fec2" type="date">
                </div>                 
            </td>
            <td>
                <div class="col-xs-4">
                    <label for="btnbuscar">Presione:</label>
                    <input type="submit" class="btn btn-default" id="btnbuscar" name="btnbuscar" value="Buscar">
                </div>
            </td>
        </tr>
    </table>
</div>
<br>
<div>
    <table id="detallenevera" class="display responsive nowrap table-bordered centrado" width="90%" cellpadding="2">
        <thead>
            <tr>
                <th>Hora</th>
                <th>Fecha</th>
                <th>Temperatura</th>
                <th>Humedad</th>
                <th>Energia</th>
            </tr>
        </thead>

    </table>
</div>
<br>
<br>
<div id="chart-div" align="center">
</div>
<?php
down();
?>