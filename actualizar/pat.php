<?php
//Conexion con la base
mysql_connect("localhost","root","root"); 
//Selección de la base de datos con la que vamos a trabajar 
mysql_select_db("patentes"); 
//Ejecucion de la sentencia SQL
$sql =  "SELECT * FROM PATENTE
ORDER BY CLAVE_PAN ASC";

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
<title>Patente - Prototypex</title>
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
	   <p><li><a href="/Prototypex/pat.php" style="color: #ffffff;"/>Regresar</a></li></p>
	   </div>    
	   <div id="main-header" align=center><img src="/Prototypex/images/blanco/logo.png"></div>
	   <div id="derecho" align=center>
	   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	   <b><p>2018 - PrototypeX © by Isolated Systems ©</p>
	   <p>Todos los derechos resevados.</p></b>
	   </div>
       	<div id="central" align="center">
		<br><br><br><br><br><br><br><br><br><br><br><br><br>
		<p style="color: #3097FF; font-weight: bold; font-size: 30px;">PATENTE - ACTUALIZAR</p>
    <table align="center" border="1">
    <tr>
    <td align=center>CLAVE</td>
    <td align=center>NOMBRE </td>
	<td align=center>FECHA</td>
	<td align=center>INVENTOR</td>
	<td align=center>EMPRESA</td>
    </tr>
 <?
while ($row=mysql_fetch_array ($resultado1))
{
echo "<tr><td align=center>". $row["CLAVE_PAN"]. "</td>";
echo "<td align=center>". $row["NOM_PAN"]. "</td>";
echo "<td align=center>". $row["FECHA_P"]. "</td>";
echo "<td align=center>". $row["CI2"]. "</td>";
echo "<td align=center>". $row["CE2"]. "</td>";
echo "<td><a href=".$_SERVER['PHP_SELF']."?cambiar=".$row['CLAVE_PAN']."><img src='/Prototypex/images/opciones/edit.png' height=32></a></td></tr>";
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
	$tabla="patente";
	$sql = "SELECT * FROM ".$tabla." WHERE CLAVE_PAN=".$cambiar;
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
	<title>Patente - Prototypex</title>
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
		    <p><li><a href="pat.php" style="color: #ffffff;"/>Regresar</a></li></p>
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
		<p style="color: #ffffff;"/><a href="javascript:window.abrir('/Prototypex/popup/inv.php')"><img src="/Prototypex/images/azul/coninventorb.png"></a>___<a href="javascript:window.abrir('/Prototypex/popup/emp.php')"><img src="/Prototypex/images/azul/conempresab.png"></a></p>
			<p style="color: #3097FF; font-weight: bold; font-size: 30px;">PATENTE - EDITANDO DATOS</p>
			<form action="<?php echo $_SERVER['PHP_self'];?>" method="post" name="patente">
			<p> <input type="hidden" align="LEFT" name="id" value="<?php echo $registro['CLAVE_PAN'];?>" /><p>
			<p style="font-weight: bold; font-size: 15px">NOMBRE: &nbsp; &nbsp;<input type="text" align="LEFT" name="nombre" value="<?php echo $registro['NOM_PAN'];?>"/><p>
			<p style="font-weight: bold; font-size: 15px">FECHA DE INGRESO: &nbsp; &nbsp;<input type="text" align="LEFT" name="fecha" value="<?php echo $registro['FECHA_P'];?>"/><p>

<?

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


?>


			<input type="submit" value="Actualizar" name="Actualizar">
			</form>
<?PHP
}
if($_POST){
		$sql="UPDATE ".$tabla." SET
		NOM_PAN='$nombre',
		FECHA_P='$fecha',
		CI2='$inv',
		CE2='$emp'
		WHERE CLAVE_PAN=".$cambiar;
		if(@mysql_query($sql)){
			echo '<script>alert("Registro actualizado.");</script>';
			echo '<script type="text/javascript">window.location="pat.php";</script>';
		}
		else{
			echo '<script>alert("Error al actualizar el registro.");</script>';
			echo '<script type="text/javascript">window.location="pat.php";</script>';
			echo mysql_errno();
		if (mysql_errno()==1452){
			echo '<script>alert("Existe una restricción y tendrá que actualizar datos en editorial.");</script>';
						echo '<script type="text/javascript">window.location="pat.php";</script>';
			}
		}
	echo '</body></html>';
}
?>