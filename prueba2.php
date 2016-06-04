<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<body>

	<div id="lista">
		hola mundo
		<p id="result">
			
		</p>
	</div>

</body>
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

	getJSON('ws.php?opcion=getdatosFinales&listaParametros=2', function(err, data) {
		  if (err != null) {
		    alert('Something went wrong: ' + err);
		  } else {
		    result.innerText = data[0].ciudad+" "+data[0].nombre;
		  }
		});
	getJSON("ws.php?opcion=validarLogin&listaParametros='"+"usuario1"+"','"+"qwerty"+"'", function(err, data){
		if (err!=null){
			alert('No se pudo validar: '+err);
		} else{
			alert(data[0].login);
			result.innerText+=" "+data[0].login+" "+data[0].nombre;
		}
	});


	});




	var getJSON = function(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('get', url, true);
    xhr.responseType = 'json';
    xhr.onload = function() {
      var status = xhr.status;
      if (status == 200) {
        callback(null, xhr.response);
      } else {
        callback(status);
      }
    };
    xhr.send();
};

</script>
</html>