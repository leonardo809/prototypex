<?php
//Conexion con la base
mysql_connect("localhost","root","root"); 
//Selección de la base de datos con la que vamos a trabajar 
mysql_select_db("patentes"); 
//Ejecucion de la sentencia SQL
$sql =  "SELECT * FROM CALLE
ORDER BY CLAVE_CAL ASC";
$resultado1= @ mysql_query ($sql);
if (!$_POST and !$_GET)
        { //evalua si se enviaron los datos del formulario
	?>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<link rel="shortcut icon" href="/Prototypex/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="/Prototypex/images/favicon.ico" type="image/x-icon">
<head>
<script>
function abrir(url) { 
open(url,'','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=750,height=500,left=600,top=100')
}
</script> 
<link rel="stylesheet" type="text/css" href="protostyle.css">
<title>Calle - Prototypex</title>
<style type="text/css">
html, body {
	width: 100%;
	height: 100%;
	margin: 0;
	overflow: hidden;
	background-color: #000;
	font-family: Calibri, Arial, Calibri;
	font-size: 13px;
} 
</style>
</head>
<body>
<div id="caja"> 
       <div id="izquierdo" align=center>
	   <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	   <p><li><a href="/Prototypex/cal.php" style="color: #ffffff;"/>Regresar</a></li></p>
	   </div>    
	   <div id="main-header" align=center><img src="/Prototypex/images/blanco/logo.png"></div>
	   <div id="derecho" align=center>
	   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	   <b><p>2018 - PrototypeX © by Isolated Systems ©</p>
	   <p>Todos los derechos resevados.</p></b>
	   </div>
       	<div id="central" align="center">
		<br><br><br><br><br><br><br><br><br><br><br><br><br>
		<p style="color: #3097FF; font-weight: bold; font-size: 30px;">CALLE - ACTUALIZAR</p>
    <table align="center" border="1">
    <tr>
    <td align=center>CLAVE</td>
	<td align=center>CALLE</td>
	</tr>
 <?
while ($row=mysql_fetch_array ($resultado1))
{
echo "<tr><td align=center>". $row["CLAVE_CAL"]. "</td>";
echo "<td align=center>". $row["NOM_CAL"]. "</td>";
echo "<td><a href=".$_SERVER['PHP_SELF']."?cambiar=".$row['CLAVE_CAL']."><img src='/Prototypex/images/opciones/edit.png' height=32></a></td></tr>";
}
echo'</FORM>
</table>
<br>
</div>
</div>
</body>
</html>';
}
if (isset ($cambiar)){
	$db="patentes";
	$tabla="calle";
	$sql = "SELECT * FROM ".$tabla." WHERE CLAVE_CAL=".$cambiar;
	$registro = @mysql_query($sql);
	if(!$registro){
		echo '<script>alert("No se pudo obtener los detalles del registro.");</script>';
	}
	$registro = mysql_fetch_array($registro);
	
	?>
	<html xmlns="http://www.w3.org/1999/xhtml">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
	<link rel="shortcut icon" href="/Prototypex/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/Prototypex/images/favicon.ico" type="image/x-icon">
	<head>
	<link rel="stylesheet" type="text/css" href="protostyle.css">
	<title>Calle - Prototypex</title>
	<style type="text/css">
	html, body {
		width: 100%;
		height: 100%;
		margin: 0;
		overflow: hidden;
		background-color: #000;
		font-family: Calibri, Arial, Calibri;
		font-size: 13px;
	} 
	</style>
	</head>
	<body>
	<div id="caja"> 
	        <div id="izquierdo" align=center>
		    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		    <p><li><a href="cal.php" style="color: #ffffff;"/>Regresar</a></li></p>
		    </div>    
		    <div id="main-header" align=center><img src="/Prototypex/images/blanco/logo.png"></div>
		    <div id="derecho" align=center>
		    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		    <br><br><br><br><br><br>
		    <b><p>2018 - PrototypeX © by Isolated Systems ©</p>
		    <p>Todos los derechos resevados.</p></b>
		    </div>
	        <div id="central" align="center">
			<br><br><br><br><br><br><br><br><br><br><br><br><br>
			<p style="color: #3097FF; font-weight: bold; font-size: 30px;">CALLE - EDITANDO DATOS</p>
			<form action="<?php echo $_SERVER['PHP_self'];?>" method="post" name="calle">
			<p> <input type="hidden" align="LEFT" name="id" value="<?php echo $registro['CLAVE_CAL'];?>" /><p>
			<p style="font-weight: bold; font-size: 15px">CALLE: &nbsp; &nbsp;<input type="text" align="LEFT" name="nombre" value="<?php echo $registro['NOM_CAL'];?>"/><p>
			<input type="submit" value="Actualizar" name="Actualizar">
			</form>
<?PHP
}
if($_POST){
		$sql="UPDATE ".$tabla." SET
		NOM_CAL='$nombre'
		WHERE CLAVE_CAL=".$cambiar;
		if(@mysql_query($sql)){
			echo '<script>alert("Registro actualizado.");</script>';
			echo '<script type="text/javascript">window.location="cal.php";</script>';
		}
		else{
			echo '<script>alert("Error al actualizar el registro.");</script>';
						echo '<script type="text/javascript">window.location="cal.php";</script>';
			echo mysql_errno();
		if (mysql_errno()==1452){
			echo '<script>alert("Existe una restricción y tendrá que actualizar datos en editorial.");</script>';
						echo '<script type="text/javascript">window.location="cal.php";</script>';
			}
		}
	echo '</body></html>';
}
?>