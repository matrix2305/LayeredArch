<?php
namespace AppCore\Interfaces;

interface IPostsService
{
    public function GetAllPosts();

    public function NewPost($tittle, $text);

    public function GetSinglePost($id);
}