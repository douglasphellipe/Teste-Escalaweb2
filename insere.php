<?php 

include 'conexao.php'; //Faz a conexão com o banco

$nome_usuario = $_POST['nome_usuario']; //Declaração de Variáveis
$data_nasc = $_POST['data_nasc'];
$email_usuario = $_POST['email_usuario'];
$senha_usuario = $_POST['senha_usuario'];
$telefone_usuario = $_POST['telefone_usuario'];
$mensagem = $_POST['mensagem'];

$sql = "INSERT INTO tb_contatos (nome_usuario, data_nasc, email_usuario, senha_usuario, telefone_usuario, mensagem)"; //Insere os dados no banco
$sql .= "VALUES('$nome_usuario', '$data_nasc', '$email_usuario', '$senha_usuario', '$telefone_usuario', '$mensagem')";

if ($conexao->query($sql) === TRUE) {  //Caso o Usuario seja cadastrado ele irá acessar a página
	echo  "Usuário incluído com sucesso!";
	header("Location: login.html");
} else {
	echo "Erro: " . $sql . "<br>" . $conexao->error;
}


