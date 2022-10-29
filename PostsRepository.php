<?php

namespace Repository;

interface IPostsRepository
{
    public function create_post(Post $post);
    public function update_post(Post $post);
    public function get_all_posts();
    public function get_post_by_id(int $post_id);
}

class PostsRepositoryDB implements IPostsRepository
{
    public function create_post(Post $post) : bool
    {
        global $wpdb;

        return (bool)$wpdb->insert($wpdb->prefix . 'posts',
            [
                'post_id'      => $post->post_id,
                'post_author'  => $post->post_author,
                'post_title'   => $post->post_title,
                'post_content' => $post->post_content,
                'post_date'    => $post->post_date
            ]
        );
    }

    public function update_post(Post $post) : bool
    {
        global $wpdb;

        return (bool)$wpdb->insert($wpdb->prefix . 'posts',
            [
                'post_author'  => $post->post_author,
                'post_title'   => $post->post_title,
                'post_content' => $post->post_content,
                'post_date'    => $post->post_date
            ],
            [
                'post_id' => $post->post_id
            ]
        );
    }

    public function get_all_posts() : array
    {
        global $wpdb;

        $posts_data = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'post'");

        $posts_arr = [];

        foreach ($posts_data as $item) {
            $post = new Post();

            foreach ($item as $field => $value) {
                $post->$field = $value;
            }

            $posts_arr[] = $post;
        }

        return $posts_arr;
    }

    public function get_post_by_id(int $post_id) : Post
    {
        global $wpdb;

        $post_data = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'post'");

        $post = new Post();

        foreach ($post_data as $field => $value) {
            $post->$field = $value;
        }

        return $post;
    }
}

class PostsRepositoryAPI implements IPostsRepository
{
    public function create_post(Post $post) : bool
    {
    }

    public function update_post(Post $post) : bool
    {
    }

    public function get_all_posts() : array
    {
    }

    public function get_post_by_id(int $post_id) : Post
    {
    }
}