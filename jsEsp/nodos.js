function nodos(){
	this.crear = function (tipo,val_id,val_class,padre_id){
       var nod1 = document.createElement(tipo);
       nod1.setAttribute("id",val_id);
       nod1.setAttribute("class",val_class);
       document.getElementById(padre_id).appendChild(nod1);
	}
	this.atributos = function (val_id,atri,valor){
      document.getElementById(val_id).setAttribute(atri,valor);
	}
	this.borrar = function (val_id,padre_id){
		var x = document.getElementById(padre_id);
		var k = document.getElementById(val_id);
        x.removeChild(k);
	}
	this.crearTexto= function(padre_id,texto){
		var nod1 = document.createTextNode(texto);
        document.getElementById(padre_id).appendChild(nod1);
	}
}