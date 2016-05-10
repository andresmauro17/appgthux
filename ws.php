<?php
require 'lib/nusoap.php';
$server=new nusoap_server();
$namespace='http://localhost/app/ws.php';

$server->configureWSDL('MDO.net WebService');
$server->wsdl->schemaTargetNamespace=$namespace;

$server->register('HelloWorld',
array('name'=>'xsd:string'),
array('return'=>'xsd:string'),
$namespace,
false,
'rpc',
'encoded',
'Simple Hello World Method');

$server->wsdl->addComplexType('MyComplexType','complexType','struct','all','',
array('ID'=>array('name'=>'ID', 'type' => 'xsd:int'),
'YourName'=> array('name'=>'YourName','type'=> 'xsd:string')));
$server->register(
'HelloComplexWorld',
array('name'=>'tns:MyComplexType'),
array('return'=>'tns:MyComplexType'),
$namespace,
false,
'rpc',
'encoded',
'Complex Hello World Method');


function HelloWorld($name)
{
	return 'Hello, World! and ->'.$name;
}

function HelloComplexWorld($mycomplextype)
{
	return $mycomplextype;
}
$POST_DATA=isset($GLOBALS['HTTP_RAW_POST_DATA'])?$GLOBALS['HTTP_RAW_POST_DATA'] : '';
$server->service($POST_DATA);
exit();
?>
