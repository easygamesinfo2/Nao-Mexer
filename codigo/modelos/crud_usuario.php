<?php 

	require "usuario.php";
	require "DBconnection.php";

	class crud_usuario{

		private $conexao;

		public function get_usuarios(){

			$this->conexao=DBconnection::getConexao();
			$sql = 'select * from usuario';
			$resultado = $this->conexao->query($sql);
			$usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
			$lista_usuarios = [];

			foreach ($usuarios as $usuario) {
				$lista_usuarios[] = new usuario($usuario['cod_usuario'],$usuario['nome'],$usuario['email'],$usuario['senha'],$usuario['cod_tip']);
			}

			return $lista_usuarios;

		}

		public function insert_usuario(usuario $use){

			$this->conexao=DBconnection::getConexao();
			$dados[] = $use->getId();
			$dados[] = $use->getNome();
			$dados[] = $use->getEmail();
			$dados[] = $use->getSenha();
			$this->conexao->exec("insert into usuario(nome,email,senha,cod_tip) values('$dados[0]', '$dados[1]','$dados[2]',1)");

		}

		public function atualiza_usuario(usuario $use,$id){

			$this->conexao = DBconnection::getConexao();
			$dados[] = $use->getId();
			$dados[] = $use->getNome();
			$dados[] = $use->getEmail();
			$dados[] = $use->getSenha();
			$sql = "update usuario set nome = '$dados[0]',email = '$dados[1]',senha = '$dados[2]' where cod_usuario = $id";
			$this->conexao->exec($sql);

		}

		public function excluir_usuario(int $id){
			$this->conexao = DBconnection::getConexao();
			$sql = "delete from usuario where cod_usuario = $id";
			$this->conexao->exec($sql);
		}

	}

















 ?>