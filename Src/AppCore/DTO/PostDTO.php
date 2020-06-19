<?php

namespace AppCore\DTO;

use AppCore\Entities\Post;

class PostDTO
{
    public $id, $tittle, $text;

    public function __construct(Post $post)
    {
        $this->id = $post->getId();
        $this->tittle = $post->getTittle();
        $this->text = $post->getText();
    }
}