CREATE DEFINER=`isotronica`@`%` PROCEDURE `datosfinales`(IN _idEmpresa INT(10))
BEGIN

DECLARE ID_NEVERA INT;
DECLARE lasneveras CURSOR FOR
SELECT idNevera FROM nevera WHERE empresa_id=_idEmpresa and activa=1 ;

DECLARE CONTINUE HANDLER FOR NOT FOUND SET @hecho= TRUE;

CREATE TEMPORARY TABLE IF NOT EXISTS datosfinales(nevera int, ciudad varchar(20), 
nombre varchar(20), hora time, fecha date, temperatura decimal(4,2), 
humedad float, energia tinyint) ENGINE=MEMORY ;

OPEN lasneveras;

loop1: LOOP
FETCH lasneveras INTO ID_NEVERA;

IF @hecho THEN
	LEAVE loop1;
END IF;

INSERT INTO datosfinales
SELECT 
    a.nevera_idNevera AS nevera,
    n.cuidad AS ciudad,
    n.nombreNevera AS nombre,
    a.hora,
    a.fecha,
    a.temperatura AS temper,
    a.humedad AS humed,
    a.energia
FROM
    datos a  
INNER JOIN
	nevera n
    on a.nevera_idNevera = n.idNevera
WHERE 
	a.nevera_idNevera=ID_NEVERA
ORDER BY a.idDatos DESC limit 1 ;

END LOOP loop1;

select * from datosfinales;
END