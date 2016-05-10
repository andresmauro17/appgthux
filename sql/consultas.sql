show databases

use Amarey

show tables

select * from Amarey.datos limit 10
select * from Amarey.nevera where empresa_id=13 and activa=1;
drop procedure datostemp

CALL Amarey.datosfinales(18);


CALL datostemp()
verificar el tamaño del nombre
y que devolvia la tilde, el 23 sale bien

select idNevera,nombrenevera, replace(nombrenevera, 'ó', 'o') from nevera where nombrenevera regexp '[^ -~]';

call Amarey.getDatosSensor();

update nevera set nombreNevera='Biologicos_viejo' where idNevera=9

select * from nevera order by nombreNevera

select * from usuarios