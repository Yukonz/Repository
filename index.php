<?php

require_once 'Post.php';
require_once 'PostsRepository.php';
require_once 'RepositoryController.php';

if ($condition) {
    $repository = new \Repository\PostsRepositoryDB();
} else {
    $repository = new \Repository\PostsRepositoryAPI();
}

$controller = new \Repository\RepositoryController($repository);

$post = $controller->get_post(12345);
