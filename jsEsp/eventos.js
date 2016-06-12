function listar(){
   var clase = new nodos();
  $.ajax({
  		url: '../plagas/php/cargar_combos.php',
  		type: 'post',
  		data: {},
  		success: function (data) {
  			var dato = data.split(',');
  			for (var i = 0; i < dato.length; i++) {
  			    clase.crear("option",dato[i],dato[i],"user");
  			    clase.crear("option",dato[i]+2,dato[i]+2,"user2");
  			    clase.crear("option",dato[i]+3,dato[i]+3,"user3");
  			    
  			    clase.atributos(dato[i],"value",dato[i]);
  			    clase.crearTexto(dato[i],dato[i]);

  			    clase.atributos(dato[i]+2,"value",dato[i]);
  			    clase.crearTexto(dato[i]+2,dato[i]);

  			    clase.atributos(dato[i]+3,"value",dato[i]);
  			    clase.crearTexto(dato[i]+3,dato[i]);
  		    }
  		}
  	});

}
function limpiar_clave(){
	var dato = document.getElementById('user').value;
	$.ajax({
			url: '../plagas/php/blanqueo.php',
			type: 'post',
			data: {dat:dato},
				success: function (respuesta) {
					if (respuesta == "ok"){
					   alert ('Se modifica la clave del usuario ' + dato + ' se carga clave 123456');	
					}else{
						alert ("Este usuario no puede blanquear claves");
					}
					
				},
				error: function (){
					alert ('No fue posible modificar la clave');
				}
            
		});
}

///Nuevo usuario////////
function nuevo(){
    var user = document.getElementById('Nusuario').value;
	$.ajax({
			url: '../plagas/php/nuevo_usuario.php',
			type: 'post',
			data: {'dato':user},
			success: function (respuesta) {
				if (respuesta == "creado") {
                  //limpiar campos
                  document.getElementById ('Nusuario').value = "";
                    //Mostrar mensaje 

                    alert ('Se creo el usuario ' + user + ' con el password: 123456, por favos dar aviso al cliente que debe cambiar la clave');

				}else{
					alert (respuesta);
				}
			}
		});
}


/////////////////Subir archivo ////////////////////////////////////////////
function subir (){
	var formdata = new FormData (document.getElementById('subFile'));
	formdata.append ('tipo', document.getElementById('tipo2').value);
	formdata.append ('user2', document.getElementById('user2').value);
	formdata.append ('Fdesde', document.getElementById('Fdesde2').value);

	$.ajax({
			url: '../plagas/php/subir.php',
			type: 'post',
			data: formdata,
		    processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
			success: function (data) {
				if (data=="correcto") {
                    //limpiar campos
                    document.getElementById('Fdesde2').value = "";
                    //Mensaje satisfactorio
                    alert ('El archivo se cargo correctamente');

				} else {
					alert ("El error obtenido es: " + data);
				}
			}
		});
}


///////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
function inicio(){
	this.listar ();
	document.getElementById ('bto_blanc').onclick = limpiar_clave;
	document.getElementById('btoNuevo').onclick = nuevo;
	document.getElementById('bto_subir').onclick = subir;
	
}

window.onload = inicio;

