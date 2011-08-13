<?php

    require_once('./autoload.php');

    $post = new Post;
    $lista = $post->listarPost("./banco/blog.txt");

?>	
	<table align="center" border="1">
	<h1 align="center">Posts</h1>
	<tr>
		<td>Titulo</td>
		<td>C</td>
		<td>Conteudo</td>
		<td>Editar</td>
		<td>Remover</td>
	</tr>
<?php

    foreach($lista as $dados){
        $separado = explode('|', $dados);

            echo "
				<tr>
					<td>{$separado[1]}</td>
					<td>{$separado[2]}</td>
					<td>{$separado[3]}</td>
					<td><a href='alterarpost.php?id={$separado[0]}'>Editar</a></td>
					<td><a href='removerpost.php?id={$separado[0]}'>Remover</a></td>	
				</tr>";					
    } 
?>
	</table>
