<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="refresh" content="300" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>G-Thux</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"></link>
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
        <script src="js/scripts.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <link href="css/bootstrap-3.3.5-dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <script src="css/bootstrap-3.3.5-dist/js/bootstrap.min.js" type="text/javascript"></script>

    </head>

    <body>


        <div class="as_wrapper">
            <h1><a href="">G-Thux Software</a></h1>
            <p>Por favor escriba su usuario y su clave para ingresar al sistema</p>

            <br/>
            <form>
                <table class="mytable">
                    <tr>
                        <td colspan="2"><h3 class="as_login_heading">Acceso</h3></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div class="login_result" id="login_result"></div></td>
                    </tr>
                    <tr>
                        <td>Usuario</td>
                        <td><input type="text" name="username" id="username" class="as_input" /></td>
                    </tr>
                    <tr>
                        <td>Clave</td>
                        <td><input type="password" name="password" id="password" class="as_input" /></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="login" id="login" class="as_button" value="Ingresar &raquo;" /></td>
                    </tr>
                </table>
            </form>
        </div>


    </body>

</html>