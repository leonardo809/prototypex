<?php
//Conexion con la base
mysql_connect("localhost","root","root"); 
//Selección de la base de datos con la que vamos a trabajar 
mysql_select_db("patentes"); 
//Ejecucion de la sentencia SQL
$sql =  "SELECT * FROM EMPRESA
ORDER BY CLAVE_EM ASC";

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
<title>Empresa - Prototypex</title>
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
	   <p><li><a href="/Prototypex/emp.php" style="color: #ffffff;"/>Regresar</a></li></p>
	   </div>    
	   <div id="main-header" align=center><img src="/Prototypex/images/blanco/logo.png"></div>
	   <div id="derecho" align=center>
	   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	   <b><p>2018 - PrototypeX © by Isolated Systems ©</p>
	   <p>Todos los derechos resevados.</p></b>
	   </div>
       	<div id="central" align="center">
		<br><br><br><br><br><br><br><br><br><br><br><br><br>
		<p style="color: #3097FF; font-weight: bold; font-size: 30px;">EMPRESA - ACTUALIZAR</p>
    <table align="center" border="1">
    <tr>
    <td align=center>CLAVE</td>
    <td align=center>NOMBRE </td>
	<td align=center>CALLE</td>
	<td align=center>COLONIA</td>
	<td align=center>DELEGACIÓN</td>
    </tr>
 <?
while ($row=mysql_fetch_array ($resultado1))
{
echo "<tr><td align=center>". $row["CLAVE_EM"]. "</td>";
echo "<td align=center>". $row["NOM_EM"]. "</td>";
echo "<td align=center>". $row["CCA"]. "</td>";
echo "<td align=center>". $row["CC"]. "</td>";
echo "<td align=center>". $row["CD"]. "</td>";
echo "<td><a href=".$_SERVER['PHP_SELF']."?cambiar=".$row['CLAVE_EM']."><img src='/Prototypex/images/opciones/edit.png' height=32></a></td></tr>";
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
	$tabla="empresa";
	$sql = "SELECT * FROM ".$tabla." WHERE CLAVE_EM=".$cambiar;
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
	<title>Empresa - Prototypex</title>
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
		    <p><li><a href="emp.php" style="color: #ffffff;"/>Regresar</a></li></p>
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
					<p style="color: #ffffff;"/><a href="javascript:window.abrir('/Prototypex/popup/cal.php')"><img src="/Prototypex/images/azul/concalleb.png"></a>___<a href="javascript:window.abrir('/Prototypex/popup/col.php')"><img src="/Prototypex/images/azul/concoloniab.png"></a></a>___<a href="javascript:window.abrir('/Prototypex/popup/del.php')"><img src="/Prototypex/images/azul/condelegacionb.png"></a></p>
			<p style="color: #3097FF; font-weight: bold; font-size: 30px;">EMPRESA - EDITANDO DATOS</p>
			<form action="<?php echo $_SERVER['PHP_self'];?>" method="post" name="empresa">
			<p> <input type="hidden" align="LEFT" name="id" value="<?php echo $registro['CLAVE_EM'];?>" /><p>
			<p style="font-weight: bold; font-size: 15px">NOMBRE: &nbsp; &nbsp;<input type="text" align="LEFT" name="nombre" value="<?php echo $registro['NOM_EM'];?>"/><p>
<?
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
?>
			<input type="submit" value="Actualizar" name="Actualizar">
			</form>
<?PHP
}
if($_POST){
		$sql="UPDATE ".$tabla." SET
		NOM_EM='$nombre',
		CCA='$cal',
		CC='$col',
		CD='$del'
		WHERE CLAVE_EM=".$cambiar;
		if(@mysql_query($sql)){
			echo '<script>alert("Registro actualizado.");</script>';
			echo '<script type="text/javascript">window.location="emp.php";</script>';
		}
		else{
			echo '<script>alert("Error al actualizar el registro.");</script>';
			echo '<script type="text/javascript">window.location="emp.php";</script>';
			echo mysql_errno();
		if (mysql_errno()==1452){
			echo '<script>alert("Existe una restricción y tendrá que actualizar datos en editorial.");</script>';
						echo '<script type="text/javascript">window.location="emp.php";</script>';
			}
		}
	echo '</body></html>';
}
?>