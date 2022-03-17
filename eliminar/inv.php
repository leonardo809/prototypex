<?
//Conexion con la base
mysql_connect("localhost","root","root"); 
//Selección de la base de datos con la que vamos a trabajar 
mysql_select_db("patentes"); 
//Ejecucion de la sentencia SQL
$sql =  "SELECT INVENTOR.CLAVE_INV, INVENTOR.NOM_INV, INVENTOR.RFC_INV, INVENTOR.FECHA_INV, NOM_DEL, NOM_COL, NOM_CAL, NOM_EM, 
ASESOR.NOM_INV AS ASESOR FROM INVENTOR 
JOIN INVENTOR ASESOR ON INVENTOR.CI=ASESOR.CLAVE_INV
INNER JOIN COLONIA ON INVENTOR.CC2=COLONIA.CLAVE_COL
INNER JOIN DELEGACION ON INVENTOR.CD2 = DELEGACION.CLAVE_DEL
INNER JOIN CALLE ON INVENTOR.CCA2=CALLE.CLAVE_CAL
INNER JOIN EMPRESA ON INVENTOR.CE=EMPRESA.CLAVE_EM
ORDER BY CLAVE_INV ASC";
$resultado1= @ mysql_query ($sql);
if (!$_POST and !$_GET) { //evalua si se enviaron los datos del formulario
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<title>Inventor - Prototypex</title>
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
	   <p><li><a href="/Prototypex/inv.php" style="color: #ffffff;"/>Regresar</a></li></p>
	   </div>    
	   <div id="main-header" align=center><img src="/Prototypex/images/blanco/logo.png"></div>
	   <div id="derecho" align=center>
	   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	   <b><p>2018 - PrototypeX © by Isolated Systems ©</p>
	   <p>Todos los derechos resevados.</p></b>
	   </div>
       	<div id="central" align="center">
		<br><br><br><br><br><br><br><br><br><br><br><br><br>
		<p style="color: #3097FF; font-weight: bold; font-size: 30px;">INVENTOR - ELIMINAR</p>
    <table align="center" border="1">
    <tr>
    <td align=center>CLAVE</td>
    <td align=center>NOMBRE </td>
    <td align=center>RFC</td>
	<td align=center>FECHA DE INGRESO</td>
	<td align=center>CALLE</td>
	<td align=center>COLONIA</td>
	<td align=center>DELEGACIÓN</td>
	<td align=center>EMPRESA</td>
	<td align=center>ASESOR</td>
    </tr>
 <?
while ($row=mysql_fetch_array ($resultado1))
{
echo "<tr><td align=center>". $row["CLAVE_INV"]. "</td>";
echo "<td align=center>". $row["NOM_INV"]. "</td>";
echo "<td align=center>". $row["RFC_INV"]. "</td>";
echo "<td align=center>". $row["FECHA_INV"]. "</td>";
echo "<td align=center>". $row["NOM_CAL"]. "</td>";
echo "<td align=center>". $row["NOM_COL"]. "</td>";
echo "<td align=center>". $row["NOM_DEL"]. "</td>";
echo "<td align=center>". $row["NOM_EM"]. "</td>";
echo "<td align=center>". $row["ASESOR"]. "</td>";
echo "<td><a href=".$_SERVER['PHP_SELF']."?borrar=".$row['CLAVE_INV']."><img src='/Prototypex/images/opciones/delete.png' height=26></a></td>";
}
echo'</table>
<br>
</div>
</div>
</body>
</html>';
}
else {
	if (isset ($borrar)){
		$sql="DELETE FROM INVENTOR WHERE CLAVE_INV=".$borrar;
		if(@mysql_query($sql)){
			echo '<script>alert("Elemento eliminado");</script>';  
			echo '<script type="text/javascript">window.location="inv.php";</script>';
		}
		else{
			echo '<script>alert("No se pudo eliminar");</script>';  
			echo '<script type="text/javascript">window.location="inv.php";</script>';
		}
	}
}
?>