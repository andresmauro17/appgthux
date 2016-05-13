<?php
require 'lib/library.php';
  // Recoger parámetros de entrada. Se permite GET y POST
  $paramOpcion = $_REQUEST['opcion'];
  $paramLista = $_REQUEST['listaParametros'];
  $formato = strtolower($_REQUEST['format']) == 'xml' ? 'xml' : 'json';

  // Obtener consulta SQL a ejecutar
  $sql = getSQL($paramOpcion);
  $sql = aplicarParametrosSQL($sql,$paramLista);

  // Lanzar consulta a la base de datos
  if ($sql == '')
    die ('Opcion incorrecta');
  else
  {
    $datos = getArrayDatos($sql);
    echo formatData($datos,$formato);
  }

 // Dado un nombre de opción, buscar en el xml su SQL correspondiente
  function getSQL($nombreOpcion)
  {
    $xmlOpciones = simplexml_load_file('opciones.xml');
    $sql = "";
    foreach ($xmlOpciones->opcion as $opcion)
    {
      $nombre = $opcion->nombre;
      if ($nombre == $nombreOpcion)
      {
        $sql = $opcion->SQL;
        break;
      }
    }
    return $sql;
  }

  // Aplicar parámetros de la sentencia SQL
  function aplicarParametrosSQL($sql, $listaPametros)
  {
    if ($listaPametros != '')
    {
      $arrParam = explode('#',$listaPametros);
      for ($i=0; $i<count($arrParam); $i++)
      {
        $nomParam = '#PARAMETRO_'.($i+1).'#';
        $valor = $arrParam[$i];
        $sql = str_replace($nomParam, $valor, $sql);
      }
    }
    return $sql;
  }

 function getArrayDatos($sql)
  {
   // $db = mysql_connect('127.0.0.1','root','root') or die('No se pudo conectar con la base de datos');
   // mysql_select_db('jhpruebas',$db) or die('No se pudo seleccionar la base de datos.');
    //$resul = mysql_query($sql,$db) or die('Consulta incorrecta:  '.$sql);
    $resul = mysql_query($sql) or die('Consulta incorrecta:  '.$sql);

    /* create one master array of the records */
    $datos = array();
    if(mysql_num_rows($resul))
    {
     while($row = mysql_fetch_assoc($resul))
     {
      $datos[] = $row;
     }
    }

    /* disconnect from the db */
    @mysql_close($db);

    /* Return data array */
    return $datos;
  }

  function formatData($data,$format='json')
 {
    if($format == 'json' || $format == 'jsonp')
    {
      header('Content-type: application/json');
      if (isset($_REQUEST['callback']))   // Peticiones ajax
        return $_REQUEST['callback'].'('.json_encode($data).')';
      else
        return json_encode($data);
    }
    else
    {
      header('Content-type: text/xml');
      $xml = new SimpleXMLElement('<response/>');
      return array2xml($data, $xml);
    }
  }

  function array2xml($array, $xml = false)
  {
    if($xml === false)
    {
      $xml = new SimpleXMLElement('<root/>');
    }
    foreach($array as $key => $value)
    {
      if(is_array($value))
      {
        //array2xml($value, $xml->addChild($key));
        array2xml($value, $xml->addChild('item'));
      }
      else
      {
        $xml->addChild($key, htmlspecialchars($value));
      }
    }
    return $xml->asXML();
  }

?>
