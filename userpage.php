<?php 
require_once "templates/template.php";
up();
?>

<div class="as_wrapper">
    <h4>Bienvenido usuario: <b><?php echo ucfirst($_SESSION['username']); ?></b>, Click <a href="logout.php" class="as_button" role="button" >aqu&iacute; para salir correctamente del sistema.</a></h4>
</div>
<div>
    <?php
        date_default_timezone_set('America/Bogota');

        $date = date('Y/m/d H:i:s');
        echo 'Ultima actualizacion: '.$date.'&nbsp; <a class="as_button" href="userpage.php" role="button">Actualizar</a><br><br>';
        echo 'Presione clic sobre una nevera para ver el detalle y un gráfico de temperaturas por horas.<br>';
        if ($_SESSION['tipo']==='1') {
            echo '<br>Clic para ver los <a class="as_button" href="usuarios.php">Usuarios en el sistema</a>';
        }
    ?>

</div>
     <br>    <br>       
    <div>
        <table id="nevera" class="display responsive nowrap table-bordered centrado" width="90%" cellpadding="2">
            <thead>
                <tr>
                    <th>idNevera</th>
                    <th>Ciudad</th>
                    <th>Nevera</th>
                    <th>Hora</th>
                    <th>Fecha</th>
                    <th>Temperatura</th>
                    <th>Humedad</th>
                    <th>Energia</th>
                </tr>
            </thead>

        </table>
    </div>

<?php
down();
?>