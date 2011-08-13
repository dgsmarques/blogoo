<?php
/**
* Implementa��o de auto-carregamento de classes
*
* O m�todo __autoload � executado toda vez que um objeto � instanciado
*
* @author Douglas Marques <dgsmarques@gmail.com>
* @package blog_oo
*
*/  
function __autoload($classes)
{
    require_once("classes/$classes.class.php");
}
