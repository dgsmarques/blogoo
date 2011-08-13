<?php

require_once('../autoload.php');
$post = new Post;

    if ($_POST) {
        $post->inserirPost($_POST, '../banco/blog.txt');
    };
$lista = $post->listarPost('../banco/blog.txt');

?>

<html>
<head>
	<title>Blog</title>
</head>

<body>
	<form name="blog" action="" method="POST">
		<table align="center">
			<h1 align="center">Novo Post</h1>
			<tr>
				<td>Titulo</td>
				<td><input type="text" name="titulo"></td>
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
				<td><textarea name="conteudo" rows="10" cols="40"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Enviar"></td>
			</tr>
			</table>
			
			<table align="center" border="1">
			<h1 align="center">Posts</h1>
			<tr>
				<td>Titulo</td>
				<td>C</td>
				<td>Conteudo</td>
			</tr>
<?php
     $imgAlt =('../resources/img/b_edit.png');
     $imgExc =('../resources/img/b_drop.png');
     foreach ( $lista as $dados ) {

        $separado = explode('|', $dados);
        $id = $separado[0];

echo "
    <tr>
        <td>{$separado[1]}</td>
        <td>{$separado[2]}</td>
        <td>{$separado[3]}</td>
        <td><a href='alterarpost.php?id=$id'><img src='$imgAlt'></a></td>
        <td><a href='removerpost.php?id=$id'><img src='$imgExc'></a></td>	
    </tr>";					
     }


?>
				
		</table>
</body>
</html>		
