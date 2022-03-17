<?php
//Conexion con la base
mysql_connect("localhost","root","root"); 
//Selección de la base de datos con la que vamos a trabajar 
mysql_select_db("patentes"); 
//Ejecucion de la sentencia SQL
$sql =  "SELECT CLAVE_AYU, NOM_AYU, RFC, FECHA_AYU, NOM_DEL, NOM_COL, NOM_CAL, NOM_EM, NOM_INV 
FROM AYUDANTE 
INNER JOIN INVENTOR ON AYUDANTE.CI3=INVENTOR.CLAVE_INV
INNER JOIN COLONIA ON AYUDANTE.CC3=COLONIA.clave_col
INNER JOIN DELEGACION ON AYUDANTE.CD3 = DELEGACION.clave_del
INNER JOIN CALLE ON AYUDANTE.CCA3=CALLE.clave_cal
inner join empresa ON AYUDANTE.CE3=EMPRESA.CLAVE_EM";

/* SELECT NOM_A,TELF_A,NOM_C
FROM CARRERA INNER JOIN ALUMNO ON CARRERA.CLAVE_C=ALUMNO.CLAVE_C1
*/

$resultado1= @ mysql_query ($sql);
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
<title>Ayudante - Prototypex</title>
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
	   <p><li><a href="/Prototypex/ayu.php" style="color: #ffffff;"/>Regresar</a></li></p>
	   </div>    
	   <div id="main-header" align=center>	<img src="/Prototypex/images/blanco/logo.png"> </div>
	   <div id="derecho" align=center>
	   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	   <br><br><br><br><br><br>
	   <b><p>2018 - PrototypeX © by Isolated Systems ©</p>
	   <p>Todos los derechos resevados.</p></b>
	   </div>
       	<div id="central" align="center">
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<p style="color: #ffffff;"/><a href="javascript:window.abrir('/Prototypex/popup/cal.php')"><img src="/Prototypex/images/azul/concalleb.png"></a>___<a href="javascript:window.abrir('/Prototypex/popup/col.php')"><img src="/Prototypex/images/azul/concoloniab.png"></a></a>___<a href="javascript:window.abrir('/Prototypex/popup/del.php')"><img src="/Prototypex/images/azul/condelegacionb.png"></a>___<a href="javascript:window.abrir('/Prototypex/popup/emp.php')"><img src="/Prototypex/images/azul/conempresab.png"></a>___<a href="javascript:window.abrir('/Prototypex/popup/inv.php')"><img src="/Prototypex/images/azul/coninventorb.png"></a></p>
<p style="color: #3097FF; font-weight: bold; font-size: 30px;">AYUDANTE - INGRESAR UN REGISTRO</p>
 <?
echo'<FORM METHOD="POST" ACTION="ayu.php">';
echo'<p style="font-weight: bold; font-size: 15px">CLAVE: &nbsp; &nbsp; <INPUT TYPE="TEXT" NAME="id"></p>';
echo'<p style="font-weight: bold; font-size: 15px">NOMBRE: &nbsp; &nbsp; <INPUT TYPE="TEXT" NAME="nom"></p>';
echo'<p style="font-weight: bold; font-size: 15px">RFC: &nbsp; &nbsp; <INPUT TYPE="TEXT" NAME="rfc"></p>';
echo'<p style="font-weight: bold; font-size: 15px">FECHA DE INGRESO: &nbsp; &nbsp; <INPUT TYPE="TEXT" NAME="fecha"></p>';
echo'<p style="font-weight: bold; font-size: 15px">CALLE: &nbsp; &nbsp;'; 
$con="SELECT CLAVE_CAL FROM CALLE";
$res=@mysql_query($con);
if(!$res){
echo " fallo";
}
else{
echo "<select name='combo1'>";
while ($fila=mysql_fetch_array($res)){
echo "<option>", $fila['CLAVE_CAL']," </option>";
}
echo "</select>";
}
echo'</p>';
$cal=$_POST['combo1'];

echo'<p style="font-weight: bold; font-size: 15px">COLONIA: &nbsp; &nbsp;'; 
$con="SELECT CLAVE_COL FROM COLONIA";
$res=@mysql_query($con);
if(!$res){
echo " fallo";
}
else{
echo "<select name='combo2'>";
while ($fila=mysql_fetch_array($res)){
echo "<option>", $fila['CLAVE_COL']," </option>";
}
echo "</select>";
}
echo'</p>';
$col=$_POST['combo2'];

echo'<p style="font-weight: bold; font-size: 15px">DELEGACIÓN: &nbsp; &nbsp;'; 
$con="SELECT CLAVE_DEL FROM DELEGACION";
$res=@mysql_query($con);
if(!$res){
echo " fallo";
}
else{
echo "<select name='combo3'>";
while ($fila=mysql_fetch_array($res)){
echo "<option>", $fila['CLAVE_DEL']," </option>";
}
echo "</select>";
}
echo'</p>';
$del=$_POST['combo3'];

echo'<p style="font-weight: bold; font-size: 15px">EMPRESA: &nbsp; &nbsp;'; 
$con="SELECT CLAVE_EM FROM EMPRESA";
$res=@mysql_query($con);
if(!$res){
echo " fallo";
}
else{
echo "<select name='combo4'>";
while ($fila=mysql_fetch_array($res)){
echo "<option>", $fila['CLAVE_EM']," </option>";
}
echo "</select>";
}
$emp=$_POST['combo4'];
echo'</p>';

echo'<p style="font-weight: bold; font-size: 15px">INVENTOR: &nbsp; &nbsp;'; 
$con="SELECT CLAVE_INV FROM INVENTOR";
$res=@mysql_query($con);
if(!$res){
echo " fallo";
}
else{
echo "<select name='combo5'>";
while ($fila=mysql_fetch_array($res)){
echo "<option>", $fila['CLAVE_INV']," </option>";
}
echo "</select>";
}
$inv=$_POST['combo5'];
echo'</p>';

echo'<INPUT NAME="Ingresar" TYPE="SUBMIT" value="Ingresar">';
echo'<br><br><br>';
?>
<?
if(isset($_POST['Ingresar']))
{
	mysql_query("INSERT INTO AYUDANTE (CLAVE_AYU,NOM_AYU,RFC,FECHA_AYU,CCA3,CC3,CD3,CE3,CI3) VALUES ('$id','$nom','$rfc','$fecha','$cal','$col','$del','$emp','$inv')");
		echo '<script>alert("Registro ingresado");</script>'; 
	echo '<script type="text/javascript">window.location="ayu.php";</script>'; 
}
echo'</FORM>
</div>
</div>
</body>
</html>';
?>