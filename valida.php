<?php

	session_start();

	include_once("modelos/DBconnection.php");

	if((isset($_POST['email'])) && (isset($_POST['senha']))){

		//$resultado_usuario = mysqli_query($conn, $result_usuario);
		//$resultado = mysqli_fetch_assoc($resultado_usuario);

		$result_usuario = "SELECT * FROM usuario WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
		$resultado_usuario = $this->conexao->query($result_usuario);
		$resultado = $resultado_usuario->fetchAll(PDO::FETCH_ASSOC);

		if(isset($resultado)){
			$_SESSION['usuario_id'] = $resultado['id'];
			$_SESSION['usuario_nome'] = $resultado['nome'];
			$_SESSION['usuario_email'] = $resultado['email'];
			$_SESSION['usuario_senha'] = $resultado['senha'];

			//if($_SESSION['usuarioNiveisAcessoId'] == "1"){
				//header("Location: administrativo.php");
			//}
			//elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){
				//header("Location: colaborador.php");
			//}else{
				//header("Location: cliente.php");
			//}
			header("Location: index.html");

		//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//redireciona o usuario para a página de login
		}

		else{
			$_SESSION['erro_login'] = "Usuário ou senha Inválido";
			header("Location: login.php");
		}

?>