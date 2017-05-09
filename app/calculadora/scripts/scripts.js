// JavaScript Document
function currencyFormat (num) 
	{
    	return num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
	}
	
function calcularAereo()
	{

    if (document.formAereo.largoAerea.value==0){
       alert("Tiene que indicar un largo estimado")
       document.formAereo.largoAerea.focus()
       return 0;
    } 

    if (document.formAereo.altoAerea.value==0){
       alert("Tiene que indicar un alto estimado")
       document.formAereo.altoAerea.focus()
       return 0;
    } 

    if (document.formAereo.anchoAerea.value==0){
       alert("Tiene que indicar un ancho estimado")
       document.formAereo.anchoAerea.focus()
       return 0;
    } 



    if (document.formAereo.PesoAereaTexto.value==0){
       alert("Tiene que indicar un peso estimado")
       document.formAereo.PesoAereaTexto.focus()
       return 0;
    } 






		var indiceMedida = document.formAereo.MedidaAerea.selectedIndex; 
		var indicePeso = document.formAereo.PesoAerea.selectedIndex; 
		var largoa = document.formAereo.largoAerea.value; 
		var altoa = document.formAereo.altoAerea.value;
		var anchoa = document.formAereo.anchoAerea.value;
		var pesoa = document.formAereo.PesoAereaTexto.value;
		var costo = 4;
		if (indiceMedida == 1)
    	{
	      	var medidaSel = "cm";
		  	var largoCalculo = largoa * 0.39;
	      	var anchoCalculo = anchoa * 0.39;
			var altoCalculo = altoa * 0.39;
		}
		else
		{
	      	var medidaSel = "inches";
			var largoCalculo = largoa;
      		var anchoCalculo = anchoa;
      		var altoCalculo = altoa;
		}
		if (indicePeso == 1)
		{
      		var pesoSel="kg";
      		var pesoCalculo = pesoa * 2.2046;
		}
		else
    	{
      		var pesoSel="lb";
      		var pesoCalculo = pesoa;
		}
		
		var pesoVolumetrico = (largoCalculo * anchoCalculo * altoCalculo) / 166;
    	if (pesoVolumetrico > pesoCalculo)
		{
        	var monto = pesoVolumetrico * costo;
		}
		else
    	{
        	var monto = pesoCalculo * costo;
		}
		montoDef = currencyFormat(monto);
		if (monto <= 4)
		{
			document.getElementById('u231-4').innerHTML = 'A&eacute;reo';
			document.getElementById('u231-2').innerHTML = 'Costo total del Env&iacute;o';
			document.getElementById('u239-2').innerHTML = '$ ' + 4;
		}
		if (monto > 200)
		{
			document.getElementById('u231-2').innerHTML = 'Solicitar Cotizaci&oacute;n';
			document.getElementById('u231-4').innerHTML = '';
			document.getElementById('u239-2').innerHTML = '';
			window.open("../cotizacion/index.php?medidasel="+medidaSel+"&pesoSel="+pesoSel+"&pesoIndicado="+pesoa+"&largo="+largoa+"&ancho="+anchoa+"&alto="+altoa+"", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=950,height=650");
		}
		if(monto >4 && monto <= 200)
		{
			document.getElementById('u231-4').innerHTML = 'A&eacute;reo';
			document.getElementById('u231-2').innerHTML = 'Costo total del Env&iacute;o';
			document.getElementById('u239-2').innerHTML = '$ ' + montoDef;			
		}
	}
	
	
	function calcularMaritimo()
	{




 if (document.formMar.largoMar.value==0){
       alert("Tiene que indicar un largo estimado")
      document.formMar.largoMar.focus()
       return 0;
    } 

    if (document.formMar.altoMar.value==0){
       alert("Tiene que indicar un alto estimado")
       document.formMar.altoMar.focus()
       return 0;
    } 

    if (document.formMar.anchoMar.value==0){
       alert("Tiene que indicar un ancho estimado")
       document.formMar.anchoMar.focus()
       return 0;
    } 






		
		var indiceMedida = document.formMar.MedidaMar.selectedIndex; 
		var largoa = document.formMar.largoMar.value; 
		var altoa = document.formMar.altoMar.value;
		var anchoa = document.formMar.anchoMar.value;
		var costo = 15;
		if (indiceMedida == 1)
		{
			var medidaSel = "cm";
			var largoCalculo = largoa * 0.39;
            var anchoCalculo = anchoa * 0.39;
         	var altoCalculo = altoa * 0.39;
		}
		else
		{
			var medidaSel = "inches";
			var largoCalculo = largoa;
            var anchoCalculo = anchoa;
         	var altoCalculo = altoa;
		}
		var volumen = (largoCalculo * anchoCalculo * altoCalculo) / 1728;		
		var monto = costo * volumen;
		montoDef = currencyFormat(monto);
		if (monto <= 16)
		{
			document.getElementById('u231-4').innerHTML = 'Mar&iacute;timo';
			document.getElementById('u231-2').innerHTML = 'Costo total del Env&iacute;o';
			document.getElementById('u239-2').innerHTML = '$ ' + 16;
		}
		if (monto > 200)
		{
			document.getElementById('u231-2').innerHTML = 'Solicitar Cotizaci&oacute;n';
			document.getElementById('u231-4').innerHTML = '';
			document.getElementById('u239-2').innerHTML = '';
			window.open("../cotizacion/index.php?medidasel="+medidaSel+"&largo="+largoa+"&ancho="+anchoa+"&alto="+altoa+"", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=950,height=650");
		}
		if(monto >16 && monto <= 200)
		{
			document.getElementById('u231-4').innerHTML = 'Mar&iacute;timo';
			document.getElementById('u231-2').innerHTML = 'Costo total del Env&iacute;o';
			document.getElementById('u239-2').innerHTML = '$ ' + montoDef;			
		}
	}


var divState = {}; // we store the status in this object
function showhide(id) 
	{
		if (document.getElementById) 
			{
				var divid = document.getElementById(id);
				divState[id] = (divState[id]) ? false : true; // initialize / invert status (true is visible and false is closed)
				//close others
				for (var div in divState)
					{
						if (divState[div] && div != id)
							{ // ignore closed ones and the current
								document.getElementById(div).style.display = 'none'; // hide
								divState[div] = false; // reset status
							}
					}
				divid.style.display = (divid.style.display == 'block' ? 'none' : 'block');
				infoTexto.style.display = 'none';
			}
	}
	
	   function playVideo(a)
    {
		if (document.formAereo.MedidaAerea.selectedIndex == 1)
			{
        		divLargo.innerHTML = "cm";
        		divAlto.innerHTML = "cm";
        		divAncho.innerHTML = "cm";
			}
		else
			{
        		divLargo.innerHTML = "in";
        		divAlto.innerHTML = "in";
        		divAncho.innerHTML = "in";
			}
    }
	
	
	
	function playVideo2(a)
    {
		if (document.formAereo.PesoAerea.selectedIndex == 1)
			{
        		divPesoAerea.innerHTML = "kg";
			}
		else
			{
        		divPesoAerea.innerHTML = "lb";
			}
    }
	
	
	function playVideo3(a)
    {
		if (document.formMar.MedidaMar.selectedIndex == 1)
			{
          		divLargoMarit.innerHTML = "cm";
        		divAltoMarit.innerHTML = "cm";
        		divAnchoMarit.innerHTML = "cm";
			}
		else
			{
           		divLargoMarit.innerHTML = "in";
        		divAltoMarit.innerHTML = "in";
        		divAnchoMarit.innerHTML = "in";
			}
    }