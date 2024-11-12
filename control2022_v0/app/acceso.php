<html>
<head>
<meta charset="UTF-8">
<link href="web/default.css" rel="stylesheet" type="text/css" />
<title>NOTAS</title>
</head>  
<body>
<div id="container" style="width: 600px;">
<div id="header">
<h1>ACCESO DE NOTAS</h1>
</div>
<id="content">
<p><?= $contenido ?></p>
<?php global $contador; 
if( $contador < 5) { ?>
<form method="Get">
   Nº usuario : <input type="text" name="login"><br>
   <br>
   Contraseña : <input type="passwd" name="clave"><br>
   <input type="submit" value=" Enviar "> 
</form>
<?php }
else { ?>
<h1>Superado el numero de intentos por favor reinicie el navegador</h1>
<?php }?>
</div>
</div>
</body>
</html>
