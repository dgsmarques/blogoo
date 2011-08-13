<?php
/**
* Classe de controle de usuários
*
* Esta classe permite que sejam gerenciados os usuários da loja, além de
* controlar o login e logout.
*
* @author Douglas Marques <dgsmarques@gmail.com>
* @package blog_oo
*/

class Post
{
    public $txt;

    /**
    * __construct é um método mágico que e executado quando objeto 
    * for instanciado. 
	*
    */
    public function __construct()
    {
        $this->txt = new Banco;
    }

    /**
	* Neste método, simplificamos a maneira de criar novos posts
	*
	* @param array $dados Dados a serem inseridos
	* @param string $arquivo Arquivo a ser escrito
	* 
	*/
    public function inserirPost($dados, $arquivo)
    {
        $this->txt->inserir($dados, $arquivo);
    }

    /**
	* Neste método, simplificamos a maneira de alterar posts
	*
	* @param string $id ID do post a ser alterado
	* @param string $arquivo Arquivo a ser escrito
	* @param array $dados SDados a serem alterados
	*/
    public function alterarPost($dados, $arquivo, $id)
    {
        $this->txt->alterar($dados, $arquivo, $id); 
    }

    /**
	* Neste método, simplificamos a maneira de remover posts
	*
	* @param string $id ID do posts a ser removido
	*/
    public function removerPost($arquivo, $id)
    {		
        $this->txt->remover($arquivo, $id);
    }

    /**
	* Neste método, listamos todos os posts em nosso banco
	*
	* @return array Resultados da consulta ao banco de texto de posts
	*/
    public function listarPost($arquivo)
    {
        $lista = $this->txt->listar($arquivo);

        return $lista;
    }
}
