<?php
namespace AppCore\Interfaces;

use AppCore\Entities\Description;
use AppCore\Entities\Post;

interface IPostsRepository
{

    public function GetAllPosts();

    public function NewPost(Post $post, Description $description);

    public function GetSinglePost($id);

}