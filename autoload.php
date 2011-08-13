<?php
/**
* Implementação de auto-carregamento de classes
*
* O método __autoload é executado toda vez que um objeto é instanciado
*
* @author Douglas Marques <dgsmarques@gmail.com>
* @package blog_oo
*
*/  
function __autoload($classes)
{
    require_once("classes/$classes.class.php");
}
