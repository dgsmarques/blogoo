<?php
    require_once('../autoload.php');

    $post = new Post;

    $arquivo = ("../banco/blog.txt");


    if ($_GET['id']) {

        $id = ($_GET['id']);

        $post->removerPost($arquivo, $id);

        header('location: index.php');
    }
