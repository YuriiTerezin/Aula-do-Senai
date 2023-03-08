<?php 

	$usuario= $_POST["usuario"];
	$senha= $_POST["senha"];

	include_once("conexao.php");
	
    $consulta= mysqli_query($conexao, "SELECT COUNT(*) AS valor FROM login WHERE usuario='$usuario' AND senha='$senha'");
		$result= mysqli_fetch_all($consulta, MYSQLI_ASSOC);
	
	if($result[0]["valor"] > 0)
	{
		session_start();
		$_SESSION["logado"] = 1;
		header("location:menu.php");
	} 
	else 
	{
		echo "<center><h2>Usuario ou senha incorretos!</h2>";
		echo "<br><a href=\"index.php\">Voltar</a></center>";
	}
?>