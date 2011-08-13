<?php
/**
* Classe de manipulação do banco de dados em TXT.
*
* Esta classe auxilia a manipulação do banco de dados de 
* forma fácil e rápida.
*
* @author Douglas Marques <dgsmarques@gmail.com>
* @package blog_oo
*/

class Banco
{
    /**
	* O método inserir, facilitamos o modo inserir no banco.
	*
	* @param string $arquivo Arquivo que ira receber os dados
    * @param array $dados Dados a serem inseridos no arquivo, em forma 
    * de um array multi-dimensional
	*/
    public function inserir($dados, $arquivo) 
    {

        /**
		* 
		*Adicionamos o separador | e a quebra de linha
		* 
		*/
        $titulo = str_replace('|', '', $dados['titulo']);
        $conteudo = str_replace('|', '', $dados['conteudo']);
        $ar = array ("\n", "\rn");
        $conteudo = str_replace($ar, '<br />', $conteudo);

        /*
		*
		*Criamos um auto increment para os ids
		*/
       if (filesize("$arquivo") != 0) {
            $linhas = file("$arquivo", FILE_SKIP_EMPTY_LINES);		
            $total = count($linhas);
            $ultimo = $total -1;
            $ultimo = explode('|', $linhas[$ultimo]);
            $id = $ultimo[0] + 1;

       }else{

           $id = 1;

       }

        /*
		*
		* Gravamos a $string no arquivo
		*/
        $string = "$id|$titulo|{$_POST['categoria']}|$conteudo\n";

        file_put_contents("$arquivo", $string, FILE_APPEND);	

    }

    /**
	* O método alterar, facilitamos o modo alterar dados no banco.
	*
	* @param string $arquivo Arquivo que ira receber os dados
	* @param array $dados Dados a serem inseridos no arquivo, em 
    * forma de um array multi-dimensional
	* @param string $id ID do dado a ser alterado
	*/	
    public function alterar($dados, $arquivo, $id) 
    {
        /**
		* 
		*Adicionamos o separador | e a quebra de linha
		* 
		*/
        $titulo = str_replace('|', '', $dados['titulo']);
        $conteudo = str_replace('|', '', $dados['conteudo']);
        $ar = array ( "\n","\rn" );
        $conteudo = str_replace($ar, '<br />', $conteudo);

        /*
		* Lemos o arquivo com a função file jogando para um array
		*
		* FILE_SKIP_EMPTY_LINES Ignora linhas vazias
		*/
        $linhas = file($arquivo, FILE_SKIP_EMPTY_LINES);

        foreach($linhas as $chave => $linha){

        $dados = explode('|', $linha);
        /*
		* Verificamos o id e apagamos a linha
		*
		*/

            if (isset ($dados[0]) 
                && $dados[0] 
                == $id 
                ) {

                $removido = true;
                break;
            } else {
                    $removido = false;
            }
        }		

        if ($id == $dados[0]) {
            $num = ($dados[0]);
            $num = $num -1;
        }

        /*
		* Montamos a string com os novos dados
		* E gravamos em nosso arquivo
		*
		*/
        $linhas[$num] = "$id|$titulo|{$_POST['categoria']}|$conteudo\n";
        $linhas = implode("", $linhas);

        $conexao = fopen($arquivo, 'w');

        fwrite($conexao, $linhas);
        fclose($conexao);
        print_r($linhas);


    }

    /**
	* Neste método, simplificamos a maneira de remover dados do arquivo.
	*
	* @param string $arquivo Arquivo a ter dados removidos
	* @param string $id id do dado que será removido
	*/
    public function remover($arquivo, $id)
    {

        /*
		* Lemos o arquivo com a função file jogando para um array
		*
		* FILE_SKIP_EMPTY_LINES Ignora linhas vazias
		*/
        $linhas = file($arquivo, FILE_SKIP_EMPTY_LINES);

        /**
		* Pegaremos os valores e campos recebidos no método e os organizaremos
		* de modo que fique mais fácil como mostrado logo a seguir
		*/
        foreach ($linhas as $chave => $linha){

            /**
			* Explodimos a linha com o separador |
			*/
            $dados = explode('|', $linha);
            /*
			* Verificamos o id e apagamos a linha
			*
			*/
             if (isset($dados[0]) && $dados[0] == $id) {
                unset($linhas[$chave]);
                $removido = true;
                break;

             }else {
                $removido = false;
             }
        }

        /*
		* Se removido implodimos em uma string
		*
		* E gravamos em nosso arquivo
		*/
        if ($removido) {
             $linhas = implode("", $linhas);

             $conexao = fopen($arquivo, 'w');
             fwrite($conexao, $linhas);
             fclose($conexao);
        }
    }
    /**
	* Neste método, de forma simples realizamos uma consulta no arquivo
	*
	* @param string $arquivo Arquivo a ter dados consultados
	* 
	*/
    public function listar($arquivo)
    {

        /*
		* Lemos o arquivo com a função file jogando para um array
		*
		* FILE_SKIP_EMPTY_LINES Ignora linhas vazias
		*/
         $arquivo = file($arquivo, FILE_SKIP_EMPTY_LINES);

         return $arquivo;
    }
}
