<?php
namespace AppCore\Interfaces;

use AppCore\Entities\Post;

interface IPostsRepository
{

    public function GetAllPosts();

    public function NewPost(Post $post);

    public function GetSinglePost($id);

}