<?php
//Conexion con la base
mysql_connect("localhost","root","root"); 
//Selección de la base de datos con la que vamos a trabajar 
mysql_select_db("patentes"); 
//Ejecucion de la sentencia SQL
$sql =  "SELECT * FROM TELEMP";

/* SELECT NOM_A,TELF_A,NOM_C
FROM CARRERA INNER JOIN ALUMNO ON CARRERA.CLAVE_C=ALUMNO.CLAVE_C1
*/

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
	   <div id="main-header" align=center><img src="/Prototypex/images/blanco/logo.png"></div>
	   <div id="derecho" align=center>
	   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	   <b><p>2018 - PrototypeX © by Isolated Systems ©</p>
	   <p>Todos los derechos resevados.</p></b>
	   </div>
       	<div id="central" align="center">
		<br><br><br><br><br><br><br><br><br><br><br><br><br>
		<p style="color: #3097FF; font-weight: bold; font-size: 30px;">TELÉFONO DE EMPRESA - ACTUALIZAR</p>
		<table align="center" border="1">
    <tr>
    <td align=center>EMPRESA</td>
	<td align=center>TIPO DE TELÉFONO</td>
	<td align=center>NÚMERO</td>
	</tr>
 <?
while ($row=mysql_fetch_array ($resultado1))
{
echo "<tr><td align=center>". $row["CE4"]. "</td>";
echo "<td align=center>". $row["CT2"]. "</td>";
echo "<td align=center>". $row["NUM2"]. "</td>";
echo "<td><a href=".$_SERVER['PHP_SELF']."?cambiar=".$row['NUM2']."><img src='/Prototypex/images/opciones/edit.png' height=32></a></td></tr>";
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
	$tabla="TELEMP";
	$sql = "SELECT * FROM ".$tabla." WHERE NUM2=".$cambiar;
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
	<script>
function abrir(url) { 
open(url,'','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=750,height=500,left=600,top=100')
}
</script> 
	<link rel="stylesheet" type="text/css" href="protostyle.css">
	<title>Teléfono de Empresa - Prototypex</title>
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
		    <p><li><a href="telemp.php" style="color: #ffffff;"/>Regresar</a></li></p>
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
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<p style="color: #ffffff;"/><a href="javascript:window.abrir('/Prototypex/popup/emp.php')"><img src="/Prototypex/images/azul/conempresab.png"></a>___<a href="javascript:window.abrir('/Prototypex/popup/tel.php')"><img src="/Prototypex/images/azul/contelb.png"></a></p>
			<p style="color: #3097FF; font-weight: bold; font-size: 30px;">TELÉFONO DE EMPRESA - EDITANDO DATOS</p>
			<p><form action="<?php echo $_SERVER['PHP_self'];?>" method="post" name="telemp"></p>
<?
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
$tel=$_POST['combo2'];
echo'</p>';
?>
			<p style="font-weight: bold; font-size: 15px">NÚMERO: &nbsp; &nbsp;<input type="text" align="LEFT" name="nume" value="<?php echo $registro['NUM2'];?>" /><p>
			<input type="submit" value="Actualizar" name="Actualizar">
			</form>
<?PHP
}
if($_POST){
		$sql="UPDATE ".$tabla." SET
		CE4='$id',
		CT2='$tel',
		NUM2='$nume'
		WHERE NUM2=".$cambiar;
		if(@mysql_query($sql)){
			echo '<script>alert("Registro actualizado.");</script>';
			echo '<script type="text/javascript">window.location="telemp.php";</script>';
		}
		else{
			echo '<script>alert("Error al actualizar el registro.");</script>';
			echo '<script type="text/javascript">window.location="telemp.php";</script>';
			echo mysql_errno();
		if (mysql_errno()==1452){
			echo '<script>alert("Existe una restricción y tendrá que actualizar datos en editorial.");</script>';
						echo '<script type="text/javascript">window.location="telemp.php";</script>';
			}
		}
	echo '</body></html>';
}
?>