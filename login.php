<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$banco = "escalaweb16";
		//cria a conexao mysqli_connect('localizacao BD', 'usuario de acesso', 'senha', 'banco de dados')
$con = mysqli_connect('localhost', 'root', '', 'escalaweb16');
// seleciona a base de dados em que vamos trabalhar
mysqli_select_db($con, $banco);
// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT nome_usuario, data_nasc, email_usuario, senha_usuario, telefone_usuario, mensagem FROM tb_contatos");
// executa a query
$dados = mysqli_query($con, $query) or die(mysqli_error($con));
// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);
?>
<html>
	<head>
	<title>Exemplo</title>
</head>
<body>
<?php
	// se o número de resultados for maior que zero, mostra os dados
	if($total > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {
?>
			<p>Nome: <?=$linha['nome_usuario']?> <br> Nascido em: <?=$linha['data_nasc']?> <br> O seu email é: <?=$linha['email_usuario']?> <br> Sua senha é: <?=$linha['senha_usuario']?> <br> Seu telefone para contato é: <?=$linha['telefone_usuario']?> <br> <?=$linha['mensagem']?> <br></p>
<?php
		// finaliza o loop que vai mostrar os dados
		}while($linha = mysqli_fetch_assoc($dados));
	// fim do if
	}
?>
</body>
</html>
<?php
// tira o resultado da busca da memória
mysqli_free_result($dados);
?>