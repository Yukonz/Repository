<?php

namespace Repository;

class RepositoryController
{
    private IPostsRepository $repository;

    public function __construct(IPostsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function get_post(int $post_id) : Post
    {
        return $this->repository->get_post_by_id($post_id);
    }
}