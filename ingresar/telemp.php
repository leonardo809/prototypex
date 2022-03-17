<?php
//Conexion con la base
mysql_connect("localhost","root","root"); 
//Selección de la base de datos con la que vamos a trabajar 
mysql_select_db("patentes"); 
//Ejecucion de la sentencia SQL
$sql =  "SELECT NOM_EM,TIPO_TEL,NUM2
FROM TELEMP
INNER JOIN EMPRESA ON EMPRESA.CLAVE_EM=TELEMP.CE4
INNER JOIN TELEFONO ON TELEFONO.CLAVE_TEL=TELEMP.CT2";

/* SELECT NOM_A,TELF_A,NOM_C
FROM CARRERA INNER JOIN ALUMNO ON CARRERA.CLAVE_C=ALUMNO.CLAVE_C1
*/

$resultado1= @ mysql_query ($sql);
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
<title>Teléfono de la Empresa - Prototypex</title>
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
	   <p><li><a href="/Prototypex/telemp.php" style="color: #ffffff;"/>Regresar</a></li></p>
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
		<p style="color: #ffffff;"/><a href="javascript:window.abrir('/Prototypex/popup/emp.php')"><img src="/Prototypex/images/azul/conempresab.png"></a>___<a href="javascript:window.abrir('/Prototypex/popup/tel.php')"><img src="/Prototypex/images/azul/contelb.png"></a></p>
		<p style="color: #3097FF; font-weight: bold; font-size: 30px;">TELÉFONO DE EMPRESA - INGRESAR UN REGISTRO</p>
		 <?   
echo'<FORM METHOD="POST" ACTION="telemp.php">';
echo'<p style="font-weight: bold; font-size: 15px">EMPRESA: &nbsp; &nbsp;'; 
$con="SELECT CLAVE_EM FROM EMPRESA";
$res=@mysql_query($con);
if(!$res){
echo " fallo";
}
else{
echo "<select name='combo1'>";
while ($fila=mysql_fetch_array($res)){
echo "<option>", $fila['CLAVE_EM']," </option>";
}
echo "</select>";
}
$id=$_POST['combo1'];
echo'</p>';

echo'<p style="font-weight: bold; font-size: 15px">TIPO DE TELÉFONO: &nbsp; &nbsp;'; 
$con="SELECT CLAVE_TEL FROM TELEFONO";
$res=@mysql_query($con);
if(!$res){
echo " fallo";
}
else{
echo "<select name='combo2'>";
while ($fila=mysql_fetch_array($res)){
echo "<option>", $fila['CLAVE_TEL']," </option>";
}
echo "</select>";
}
$tipo=$_POST['combo2'];
echo'</p>';

echo'<p style="font-weight: bold; font-size: 15px">NÚMERO: &nbsp; &nbsp; <INPUT TYPE="TEXT" NAME="num"></p>';
echo'<INPUT NAME="Ingresar" TYPE="SUBMIT" value="Ingresar">';
echo'<br><br><br>';
?>
<?
if(isset($_POST['Ingresar']))
{
	mysql_query("INSERT INTO TELEMP (CE4,CT2,NUM2) VALUES ('$id','$tipo','$num')");	
			echo '<script>alert("Registro ingresado");</script>';  	
	echo '<script type="text/javascript">window.location="telemp.php";</script>';
}
echo'</FORM>
</div>
</div>
</body>
</html>';
?>