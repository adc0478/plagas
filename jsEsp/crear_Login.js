///funcion de login/////

function ingreso (){
   
   var datastring = {'us' : document.getElementById('Usuario').value , 'ps' : document.getElementById('password').value};
   $.ajax({
      url:'login.php',
      data:datastring,
      type:'POST',
      success: function (respuesta){
      	 //ejecuta si responde servidor
         if (respuesta=="adm"){
            document.location.href='../plagas/administrador.html';
         }else if (respuesta =="us"){
            document.location.href='../plagas/Usuario.html';
         }else{
         	document.getElementById("Usuario").value = "";
         	document.getElementById("password").value="";
         	alert ('No corresponde el usuario o la clave ingresada, por favor verificar');
         }
      },
      error : function (){
      	alert ("Error en el servidor");
      }
      
   });
}

//metodos de autocarga/////
function inicio (){
   document.getElementById('bto_log').onclick=ingreso;	
}

window.onload = inicio;












