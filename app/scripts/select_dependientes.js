function nuevoAjax()
{ 
	/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
	var xmlhttp=false;
	try
	{
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
		try
		{
			// Creacion del objet AJAX para IE
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(E)
		{
			if (!xmlhttp && typeof XMLHttpRequest!='undefined') xmlhttp=new XMLHttpRequest();
		}
	}
	return xmlhttp; 
}

// Declaro los selects que componen el documento HTML. Su atributo ID debe figurar aqui.
var listadoSelects=new Array();
listadoSelects[0]="estados";
listadoSelects[1]="ciudades";

function buscarEnArray(array, dato)
{
	// Retorna el indice de la posicion donde se encuentra el elemento en el array o null si no se encuentra
	var x=0;
	while(array[x])
	{
		if(array[x]==dato) return x;
		x++;
	}
	return null;
}

function cargaContenido(idSelectOrigen)
{
	{
		var ajaxRequest;  // The variable that makes Ajax possible!
		try
			{
				// Opera 8.0+, Firefox, Safari
				ajaxRequest = new XMLHttpRequest();
			}
		catch (e)
			{
				// Internet Explorer Browsers
				try
					{
						ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
					}
				catch (e) 
					{
						try
							{
								ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
							}
						catch (e)
							{
								// Something went wrong
								alert("Your browser broke!");
								return false;
							}
					}
			}
   
		// Create a function that will receive data
		// sent from the server and will update
		// div section in the same page.
		ajaxRequest.onreadystatechange = function()
			{
				if(ajaxRequest.readyState == 4)
					{
						var ajaxDisplay = document.getElementById('ajaxDiv');
						ajaxDisplay.innerHTML = ajaxRequest.responseText;
					}
			}
   	var selectOrigen=document.getElementById(idSelectOrigen);
		// Now get the value from user and pass it to
		// server script.
		var receipt = selectOrigen.options[selectOrigen.selectedIndex].value;
		var queryString = "?receipt=" + receipt ;
		ajaxRequest.open("GET", "select_dependientes_proceso.php" + queryString, true);
		ajaxRequest.send(null); 
	}
}