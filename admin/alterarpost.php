<?php

require_once('../autoload.php');

$post = new Post;

$arquivo = ("../banco/blog.txt");
if ($_GET['id']){
    $id = ($_GET['id']);
    if($_POST) {
        $post->alterarPost($_POST, $arquivo, $id);
        header('location: index.php');
    }

$linhas = $post->listarPost($arquivo);

    foreach($linhas as $chave => $linha){
        $dados = explode('|', $linha);

        if ($id == $dados[0]) {
             $titulo = $dados[1];
             $conteudo = $dados[3];
        }
    }
 }

?>
<html>
<head>
	<title>Editar Post</title>
</head>

<body>
<form name="blog" action="alterarpost.php?id=<?php echo $id;?>" method="POST">
	<table align="center">
		<tr>
			<td>Titulo</td>
			<td><input type="text" name="titulo" value="<?php echo $titulo;?>"></td>
		</tr>
		<tr>
			<td>Categoria</td>
			<td>
				<select name="categoria">
					<option value="A">A</option>
					<option value="B">B</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Conteudo</td>
			<td><textarea name="conteudo"rows="10" cols="40">
			<?php echo $conteudo;?>
			</textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Enviar"></td>
		</tr>			
	</table>
</form>	
</body>
</html>
