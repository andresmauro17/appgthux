CREATE DEFINER=`isotronica`@`%` PROCEDURE `datosfinales`(IN _idEmpresa INT(10))
BEGIN
SELECT 
    a.nevera_idNevera AS nevera,
    n.cuidad AS ciudad,
    n.nombreNevera AS nombre,
    a.hora,
    a.fecha,
    a.temperatura AS temper,
    a.humedad AS humed
FROM
    datos a
        INNER JOIN
    (SELECT 
        nevera_idNevera, MAX(idDatos) maxID
    FROM
        datos
	INNER join 
		nevera
        on datos.nevera_idNevera=nevera.idNevera
    WHERE
        fecha = DATE_FORMAT(NOW(), '%Y-%m-%d')
        and nevera.empresa_id=_idEmpresa
    GROUP BY nevera_idNevera) b ON a.nevera_idNevera = b.nevera_idNevera
        AND a.idDatos = b.maxID
        AND a.fecha = DATE_FORMAT(NOW(), '%Y-%m-%d')
        INNER JOIN
    nevera n ON a.nevera_idNevera = n.idNevera
        AND n.activa = 1
	order by a.hora desc ;
END