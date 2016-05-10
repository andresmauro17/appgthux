<?php 
require_once "templates/template.php";
up();
?>

<div class="as_wrapper">
    <h4>Bienvenido usuario: <b><?php echo ucfirst($_SESSION['username']); ?></b>, Click <a href="logout.php" class="as_button" role="button" >aqu&iacute; para salir correctamente del sistema.<br></a></h4>
    <h4>Click <a href="userpage.php" class="as_button" role="button">aqu&iacute; para retornar</a></h4>
</div>
<div>
    <?php
        date_default_timezone_set('America/Bogota');

        $date = date('Y/m/d H:i:s');
        echo 'Ultima actualizacion: '.$date.'&nbsp; <a class="as_button" href="usuarios.php" role="button">Actualizar</a><br>';
    ?>

</div>
     <br>    <br>       
    <div>
        <table id="usuarios" class="display responsive nowrap table-bordered centrado" width="90%" cellpadding="2">
            <thead>
                <tr>
                    <th>idSesion</th>
                    <th>Empresa</th>
                    <th>Login</th>
                    <th>idUsu</th>
                    <th>Fecha</th>
                    <th>Hora Ini</th>
                    <th>Hora Fin</th>
                </tr>
            </thead>

        </table>
    </div>

<?php
down();
?>