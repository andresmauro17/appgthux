<?php
include 'lib/library.php'; // include the library for database connection
/*
 * leeDatos devuelve las últimas lecturas por todas las neveras.
 * */
 
//test $query			= mysql_query("select nevera_idNevera as nevera, hora, fecha, temperatura as temper, humedad as humed from datos where fecha = date_format(now(),'%Y-%m-%d') and nevera_idNevera=25;"); // Check the table for actual day only
$query			= mysql_query("CALL datosfinales(".$_SESSION['empresa'].");"); // Check the table for actual day only
//$num_rows		= mysql_num_rows($query); // Get the number of rows
if($query==FALSE){ // If no nevera records return 0, siempre deberían existir para el dia actual    
    
    echo 0;
} else {

    $json = array();

    while ($row = mysql_fetch_array($query, MYSQL_ASSOC)){
      $json[] = $row;
    }
    $results = array(
        "sEcho" => 1,
        "iTotalRecords" => $num_rows,
        "iTotalDisplayRecords" => $num_rows,
        "aaData" => $json
            );
    echo json_encode($results);
    //echo 1;
}

?>
