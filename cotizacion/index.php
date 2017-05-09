<!DOCTYPE html>
<html class="nojs html" lang="es-ES">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
<meta name="description" content="Latam Xpress | Cotización de Envíos"/>
<meta name="generator" content="2015.2.1.352"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript">
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["jquery-1.8.3.min.js", "museutils.js", "museconfig.js", "jquery.watch.js", "require.js", "index.css"], "outOfDate":[]};
</script>
<title>Cotización de Envíos</title>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="css/site_global.css?crc=3916556066"/>
<link rel="stylesheet" type="text/css" href="css/index.css?crc=3760366141" id="pagesheet"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<!-- IE-only CSS -->
<!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="css/iefonts_index.css?crc=198238116"/>
  <![endif]-->
<!-- Other scripts -->
<script type="text/javascript">
   var __adobewebfontsappname__ = "muse";
</script>
<!-- JS includes -->
<script type="text/javascript">
   document.write('\x3Cscript src="' + (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//webfonts.creativecloud.com/raleway:n8,n6,n7,n5:default;montserrat:n4:default.js" type="text/javascript">\x3C/script>');
</script>
</head>
<body><form id="form1" name="form1" method="post" action="solicitaAction.php">
  <input name="medidasel" type="hidden" value="<?php echo $_GET['medidasel']; ?>" />
  <input name="pesosel" type="hidden" value="<?php echo $_GET['pesoSel']; ?>" />
  <input name="pesoindicado" type="hidden" value="<?php echo $_GET['pesoIndicado']; ?>" />
  <input name="largo" type="hidden" value="<?php echo $_GET['largo']; ?>" />
  <input name="ancho" type="hidden" value="<?php echo $_GET['ancho']; ?>" />
  <input name="alto" type="hidden" value="<?php echo $_GET['alto']; ?>" />
<div class="clearfix borderbox" id="page"><!-- column -->
  <div class="clip_frame pinned-colelem" id="u486"><!-- image --> 
    <img  style=" position:fixed; z-index:1;" class="block" id="u486_img" src="images/logo_web1.png?crc=416071818" alt="" width="221" height="83"/> </div>
  <div class="browser_width colelem" id="u489-bw">
    <div id="u489"><!-- simple frame --></div>
  </div>
  <div class="rounded-corners clearfix colelem" id="u493"><!-- group -->
    <div class="clearfix grpelem" id="u498-6"><!-- content -->
      <p id="u498-2">Cotización de envío</p>
      <p id="u498-4">Por favor llene el siguiente formulario para solicitar una cotización con las siguiente especificaciones</p>
    </div>
  </div>
  <div class="clearfix colelem" id="pu542"><!-- group -->
    <div class="rounded-corners clearfix grpelem" id="u542"><!-- column -->
      <div class="clearfix colelem" id="u619-4"><!-- content -->
        <p>Descripción de su envío</p>
      </div>
      <div class="colelem" id="u622"><!-- simple frame --></div>
      <div class="clearfix colelem" id="u548-17"><!-- content -->
        <p>Tipo de Envío:&nbsp; <span id="u548-2">
          <?php 
			if (isset($_GET['pesoSel']))
				{ 
					echo "A&eacute;reo";
				}
			else
				{ 
					echo "Mar&iacute;timo";
				}
?>
          </span></p>
        <p>Largo:&nbsp; <span id="u548-5"><?php echo $_GET['largo']; ?> &nbsp; <?php echo  $_GET['medidasel'];?></span></p>
        <p>Ancho:&nbsp; <span id="u548-8"><?php echo $_GET['ancho']; ?> &nbsp;<?php echo  $_GET['medidasel'];?></span></p>
        <p>Alto:&nbsp; <span id="u548-11"><?php echo $_GET['alto']; ?> &nbsp;<?php echo  $_GET['medidasel'];?></span></p>
        <?php 
			if (isset($_GET['pesoSel']))
				{ ?>
        <p>Peso:&nbsp; <span id="u548-14"><?php echo $_GET['pesoIndicado']; ?> &nbsp;<?php echo  $_GET['pesoSel'];?></span></p>
        <?php 	}
?>
      </div>
    </div>
    <div class="rounded-corners clearfix grpelem" id="u567"><!-- column -->
      <div class="clearfix colelem" id="pu581-4"><!-- group -->
        <div class="clearfix grpelem" id="u581-4"><!-- content -->
          <p>Nombre:</p>
        </div>
        <div class="rounded-corners grpelem" id="u593"><input type="text" class="form form-control" name="nombre" id="nombre" /></div>
      </div>
      <div class="clearfix colelem" id="pu587-4"><!-- group -->
        <div class="clearfix grpelem" id="u587-4"><!-- content -->
          <p>E-mail:</p>
        </div>
        <div class="rounded-corners grpelem" id="u596"><input name="email" type="text" class="form form-control" id="email" /></div>
      </div>
      <div class="clearfix colelem" id="pu590-4"><!-- group -->
        <div class="clearfix grpelem" id="u590-4"><!-- content -->
          <p>Teléfono de contacto</p>
        </div>
        <div class="rounded-corners grpelem" id="u599"><input name="telefono" type="text" class="form form-control" id="textfield" /></div>
      </div>
    <div align="right"><!-- container box -->
		<input type="submit" name="button" class="w3-btn w3-round-large w3-blue  w3-small" id="button" value="Cotizar" />
      </div>
    </div>
  </div>
</div></form>
<!-- Other scripts --> 
<script type="text/javascript">
   window.Muse.assets.check=function(d){if(!window.Muse.assets.checked){window.Muse.assets.checked=!0;var b={},c=function(a,b){if(window.getComputedStyle){var c=window.getComputedStyle(a,null);return c&&c.getPropertyValue(b)||c&&c[b]||""}if(document.documentElement.currentStyle)return(c=a.currentStyle)&&c[b]||a.style&&a.style[b]||"";return""},a=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),
16);return 0},g=function(g){for(var f=document.getElementsByTagName("link"),i=0;i<f.length;i++)if("text/css"==f[i].type){var h=(f[i].href||"").match(/\/?css\/([\w\-]+\.css)\?crc=(\d+)/);if(!h||!h[1]||!h[2])break;b[h[1]]=h[2]}f=document.createElement("div");f.className="version";f.style.cssText="display:none; width:1px; height:1px;";document.getElementsByTagName("body")[0].appendChild(f);for(i=0;i<Muse.assets.required.length;){var h=Muse.assets.required[i],l=h.match(/([\w\-\.]+)\.(\w+)$/),k=l&&l[1]?
l[1]:null,l=l&&l[2]?l[2]:null;switch(l.toLowerCase()){case "css":k=k.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");f.className+=" "+k;k=a(c(f,"color"));l=a(c(f,"backgroundColor"));k!=0||l!=0?(Muse.assets.required.splice(i,1),"undefined"!=typeof b[h]&&(k!=b[h]>>>24||l!=(b[h]&16777215))&&Muse.assets.outOfDate.push(h)):i++;f.className="version";break;case "js":k.match(/^jquery-[\d\.]+/gi)&&d&&d().jquery=="1.8.3"?Muse.assets.required.splice(i,1):i++;break;default:throw Error("Unsupported file type: "+
l);}}f.parentNode.removeChild(f);if(Muse.assets.outOfDate.length||Muse.assets.required.length)f="Some files on the server may be missing or incorrect. Clear browser cache and try again. If the problem persists please contact website author.",g&&Muse.assets.outOfDate.length&&(f+="\nOut of date: "+Muse.assets.outOfDate.join(",")),g&&Muse.assets.required.length&&(f+="\nMissing: "+Muse.assets.required.join(",")),alert(f)};location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi)?setTimeout(function(){g(!0)},5E3):g()}};
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput","jquery.watch"],function(d){var $ = d;$(document).ready(function(){try{
window.Muse.assets.check($);/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.resizeHeight('.browser_width');/* resize height */
Muse.Utils.requestAnimationFrame(function() { $('body').addClass('initialized'); });/* mark body as initialized */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script> 
<!-- RequireJS script --> 
<script src="scripts/require.js?crc=4108833657" type="text/javascript" async data-main="scripts/museconfig.js?crc=169177150" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
</body>
</html>
