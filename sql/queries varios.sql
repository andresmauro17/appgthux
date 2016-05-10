use Amarey;

call Amarey.validarLogin('medellin', '6323510');
call Amarey.validarLogin('cali', 'thebest1');

call Amarey.datosfinales(13);
call Amarey.getUsuarios();

drop table datosf;
select * from datosf;
truncate datosf;

CALL detallenevera(27,null,null)
CALL graficotemp(27,null,null)

call Amarey.neverasEmpresa(13); /*medellin*/
call Amarey.neverasEmpresa(11); /*cali*/
call Amarey.neverasEmpresa(18); /*barranquilla*/

select * from datos where nevera_idNevera=423

/*select concat("a"," b");*/

call Amarey.ultimoDato(4);
call Amarey.ultimoDato(5);
call Amarey.ultimoDato(6);
call Amarey.ultimoDato(2);

call Amarey.insertSesion(13,36,3)
call Amarey.cerrarSesion(13,36,3)

select * from Amarey.usuarios;
select * from Amarey.sesion;

select curdate(), curtime()


SELECT idNevera FROM Amarey.nevera WHERE empresa_id=13 and activa=1